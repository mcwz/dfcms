<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/24
 * Time: 19:30
 */

namespace backend\models;

use Yii;
use backend\models\giimodels\NodesBase;

class Nodes extends NodesBase
{
    const TYPE_SITE = 1;
    const TYPE_NODE = 2;

    public function rules()
    {
        return [
            [['pid', 'name',  'path', 'status', 'created_at', 'updated_at'], 'required'],
            [['pid', 'pos', 'type', 'attr_group_id', 'flow_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
            ['type', 'in', 'range' => [self::TYPE_SITE, self::TYPE_NODE]]
        ];
    }


    /**
     * @return array
     */
    public static function getAllNodesData()
    {
        $connection = \Yii::$app->db;
        $sql_str='SELECT * FROM nodes order by pos';
        $command = $connection->createCommand($sql_str);
        $allNodes = $command->queryAll();
        return $allNodes;
    }


    /**
     * @return array
     */
    public static function getType()
    {
        return [
            self::TYPE_NODE => Yii::t('app', 'TYPE_NODE'),
            self::TYPE_SITE => Yii::t('app', 'TYPE_SITE'),
        ];
    }

    public static function deleteOldAttrGroupAssign($nodeId)
    {
        $connection = \Yii::$app->db;
        $connection->createCommand("DELETE FROM node_attr_group WHERE node_id=".$nodeId)->execute();
    }


    /**
     * @param $nodeId
     * @param $groupsId
     * @throws \yii\db\Exception
     */
    public static function assignUserGroups($nodeId, $groupsId)
    {
        $connection = \Yii::$app->db;
        $created_at=time();
        $insert_array=array();
        foreach($groupsId as $groupId)
        {
            $insert_array[]=array($nodeId,$groupId,$created_at);
        }

        $transaction =$connection->beginTransaction();
        try
        {
            $connection->createCommand("DELETE FROM user_group_node WHERE node_id=".$nodeId)->execute();
            if(count($insert_array)>0)
                $connection->createCommand()->batchInsert('user_group_node',array('node_id','user_group_id','created_at'),$insert_array)->execute();
            $transaction->commit();
        }
        catch(\Exception $e)
        {
            $transaction ->rollBack();
        }
    }

    /**
     * @param $nodeId
     * @return null|static
     */
    public static function getAssignedAttrGroup($nodeId)
    {
        return NodeAttrGroup::findOne(array('node_id'=>$nodeId));
    }


    public static function getAssignedAttrByNode($nodeId)
    {
        $assignedAttrGroup=self::getAssignedAttrGroup($nodeId);
        if($assignedAttrGroup)
            return NodeAttrGroup::getAttrModelByGroup($assignedAttrGroup->attr_group_id);
        else
            return null;
    }

    /**
     * @param $nodeId
     * @return array
     */
    public static function getGroupsByNodeId($nodeId)
    {
        $groups_array=array();
        if(is_numeric($nodeId))
        {
            $connection = \Yii::$app->db;
            $command=$connection->createCommand("SELECT * FROM user_group_node WHERE node_id=".$nodeId);
            $groups = $command->queryAll();
            foreach($groups as $group)
            {
                $groups_array[]=$group['user_group_id'];
            }
        }

        return $groups_array;
    }

    public static function getAllParentNodes($id)
    {
        if(is_numeric($id) && $id>0)
        {
            $sql="SELECT T2.*
                    FROM(
                        SELECT
                            @r AS _id,
                            (SELECT @r := pid FROM nodes WHERE id = _id) AS parent_id,
                            @l := @l + 1 AS lvl
                        FROM
                            (SELECT @r := ".$id.", @l := 0) vars,
                            nodes h
                        WHERE @r <> 0) T1
                    JOIN nodes T2
                    ON T1._id = T2.id
                    ORDER BY T1.lvl DESC";
            return Yii::$app->db->createCommand($sql)->queryAll();
        }
        else
            return null;
    }
}