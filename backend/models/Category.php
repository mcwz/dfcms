<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/29
 * Time: 16:25
 */

namespace backend\models;


use backend\models\giimodels\CategoryBase;
use backend\models\giimodels\CategoryTreepathsBase;
use Yii;

class Category extends CategoryBase
{
    const TYPE_SITE = 1;
    const TYPE_NODE = 2;

    const STATUS_NORMAL=1;
    const STATUS_DELETE=0;

    public static function getType()
    {
        return [
            self::TYPE_NODE => Yii::t('app', 'TYPE_NODE'),
            self::TYPE_SITE => Yii::t('app', 'TYPE_SITE'),
        ];
    }

    public static function generateType($type)
    {
        switch($type)
        {
            case self::TYPE_NODE : return Yii::t('app', 'TYPE_NODE');break;
            case self::TYPE_SITE : return Yii::t('app', 'TYPE_SITE');break;
            default:return'';
        }
    }

    public static function getStatus()
    {
        return [
            self::STATUS_NORMAL => Yii::t('app', 'STATUS_NORMAL'),
            self::STATUS_DELETE => Yii::t('app', 'STATUS_DELETE'),
        ];
    }

    public static function generateStatus($status)
    {
        switch($status)
        {
            case self::STATUS_NORMAL : return Yii::t('app', 'STATUS_NORMAL');break;
            case self::STATUS_DELETE : return Yii::t('app', 'STATUS_DELETE');break;
            default:return'';
        }
    }

    public static function findAncestor($id)
    {
        $sql="SELECT c.* FROM ".parent::tableName()." AS c JOIN ".CategoryTreepathsBase::tableName()." AS t ON c.id=t.ancestor WHERE t.descendant=$id";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function findDescendant($id)
    {
        $sql="SELECT c.* FROM ".parent::tableName()." AS c JOIN ".CategoryTreepathsBase::tableName()." AS t ON c.id=t.descendant WHERE t.ancestor=$id";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function deleteTheseCategory($arrayDescendants)
    {
            $idStr="";
            foreach($arrayDescendants as $arrayDescendant)
            {
                $idStr.=','.$arrayDescendant['id'];
            }
            $idStr=substr($idStr,1);
            if(strlen($idStr)>0)
            {
                $sqlDelete="DELETE FROM ".parent::tableName()." WHERE id in($idStr) ";
                Yii::$app->db->createCommand($sqlDelete)->execute();
            }

    }

    public static function deleteCategoryDescendant($id)
    {
        $descendants=self::findDescendant($id);
        self::deleteCategoryTree($id);
        self::deleteTheseCategory($descendants);
    }

    public static function deleteCategoryTree($id)
    {
        //删除树
        $sql="DELETE FROM ".CategoryTreepathsBase::tableName()." WHERE descendant IN (SELECT descendant_table.descendant FROM (SELECT descendant FROM ".CategoryTreepathsBase::tableName()." WHERE ancestor=$id) descendant_table)";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public static function moveCategory($id,$idTo)
    {
        $sqlDelete="DELETE FROM ".CategoryTreepathsBase::tableName()." WHERE
                    descendant IN(
                        SELECT descendant FROM ".CategoryTreepathsBase::tableName()." WHERE ancestor=$id )
                    AND ancestor IN(
                        SELECT ancestor FROM ".CategoryTreepathsBase::tableName()." WHERE descendant=$id AND ancestor!=descendant
                        )";

        $sqlInert="INSERT INTO ".CategoryTreepathsBase::tableName()." (ancestor,descendant,path_length)
                        SELECT supertree.ancestor,subtree.descendant,supertree.path_length+1 FROM ".CategoryTreepathsBase::tableName()." AS supertree CROSS JOIN ".CategoryTreepathsBase::tableName().
                    " AS subtree WHERE supertree.descendant=$idTo AND subtree.ancestor=$id";

        $db=Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            // 所有的查询都在主服务器上执行
            $db->createCommand($sqlDelete)->execute();
            $db->createCommand($sqlInert)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    public static function getAllCategoryToZtreeData()
    {
        $db=Yii::$app->db;
        $sqlC="SELECT * FROM ".parent::tableName()." WHERE status= ".self::STATUS_NORMAL;
        $categories=$db->createCommand($sqlC)->queryAll();
        $sqlT="SELECT * FROM ".CategoryTreepathsBase::tableName()." WHERE path_length=1 ";
        $trees=$db->createCommand($sqlT)->queryAll();
        return self::transferDataToZtree($categories,$trees);
    }


    public static function transferDataToZtree($categories,$trees)
    {
        $relations=array();

        foreach($trees as $tree)
        {
            $relations['descendant_'.$tree['descendant']]=$tree['ancestor'];
        }

        $treeData=array();
        $i=0;
        foreach($categories as $category)
        {
            $treeData[$i]['id']=$category['id'];
            $treeData[$i]['pid']= isset($relations['descendant_'.$category['id']])?$relations['descendant_'.$category['id']]:$category['id'];
            $treeData[$i]['name']=$category['name'];
            $treeData[$i]['url']='view?id='.$category['id'];
            $treeData[$i]['target']='_self';
            if($category['id']==1)
            {
                $treeData[$i]['open']=true;
            }
            $i++;
        }
        return $treeData;
    }





    public static function deleteOldAttrGroupAssign($nodeId)
    {
        $connection = \Yii::$app->db;
        $connection->createCommand("DELETE FROM node_attr_group WHERE node_id=".$nodeId)->execute();
    }

    /**
     * @param $nodeId
     * @return null|static
     */
    public static function getAssignedAttrGroup($nodeId)
    {
        return NodeAttrGroup::findOne(array('node_id'=>$nodeId));
    }



    public static function getCategoryByUser($userId)
    {
        $cache=Yii::$app->cache;
        $key='getCategoryByUser_'.$userId;
        $data = $cache->get($key);

        if ($data === false) {
            // $data 在缓存中没有找到，则重新计算它的值
            $userGroup = UserGroup::getUserGroupsByUserId($userId);
            if ($userGroup) {
                $userGroupIds = array();
                foreach ($userGroup as $userGroupId) {
                    $userGroupIds[] = $userGroupId['id'];
                }
                if (count($userGroupIds) > 0) {
                    $sqlNodesIds = "SELECT node_id FROM user_group_node WHERE user_group_id in(" . implode(',', $userGroupIds) . ")";
                    $authNodesIds = Yii::$app->db->createCommand($sqlNodesIds)->queryAll();

                    $authNodesIdArray = array();
                    if ($authNodesIds) {
                        foreach ($authNodesIds as $authNodesId) {
                            $authNodesIdArray[] = $authNodesId['node_id'];
                        }
                    }

                    if (count($authNodesIdArray) > 0) {
                        $sql = "SELECT c.* FROM " . parent::tableName() . " AS c JOIN " . CategoryTreepathsBase::tableName() . " as t ON c.id=t.descendant WHERE t.ancestor in (" . implode(',', $authNodesIdArray) . ") UNION
                         SELECT c.* FROM " . parent::tableName() . " AS c JOIN " . CategoryTreepathsBase::tableName() . " as t ON c.id=t.ancestor WHERE t.descendant in (" . implode(',', $authNodesIdArray) . ")";
                        $categories=Yii::$app->db->createCommand($sql)->queryAll();

                        $sqlT="SELECT * FROM ".CategoryTreepathsBase::tableName()." WHERE path_length=1 AND ancestor in(".implode(',',$authNodesIdArray).") UNION
                        SELECT * FROM ".CategoryTreepathsBase::tableName()." WHERE path_length=1 AND descendant in(".implode(',',$authNodesIdArray).")";
                        $trees=Yii::$app->db->createCommand($sqlT)->queryAll();

                        $data=json_encode(self::transferDataToZtree($categories,$trees));

                        // 将 $data 存放到缓存供下次使用
                        $cache->set($key, $data);
                    }

                }
            }
        }

        return $data;
    }

}