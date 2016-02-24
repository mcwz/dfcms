<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/15
 * Time: 16:25
 */

namespace backend\models;


use backend\models\giimodels\UserGroupBase;
use Yii;

class UserGroup extends UserGroupBase
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'created_at', 'updated_at', 'pos', 'status'], 'required'],
            [['pid', 'created_at', 'updated_at', 'pos', 'status'], 'integer'],
            [['name', 'description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @param $include_default, Generate please select info
     * @param $new_update if update then don't select itself
     * @return array
     */
//    public static function getAllGroup($include_default, $update_id=0)
//    {
//        $connection = \Yii::$app->db;
//
//        if($update_id<=0)
//        {
//            $include_self='';
//        }
//        else
//        {
//            $include_self=' AND id<>'.$update_id.' ';
//        }
//
//        $sql_str='SELECT * FROM user_group WHERE status>0'.$include_self;
//        $command = $connection->createCommand($sql_str);
//        $allGroup = $command->queryAll();
//
//        $groupArr=array();
//
//        if($include_default)
//        {
//            $groupArr['0']=Yii::t('app','As root group');
//        }
//
//        foreach($allGroup as $aGroup)
//        {
////            $pathDeep=substr_count($aGroup['path'],'/');
////            $pathStr='';
////            if($pathDeep>1)
////            {
////                $pathStr='|';
////                for($i=1;$i<$pathDeep;$i++)
////                {
////                    $pathStr.='--';
////                }
////            }
////            $groupArr[$aGroup['id']]=$pathStr.$aGroup['name'];
//            $groupArr[$aGroup['id']]=$aGroup['name'];
//        }
//        return $groupArr;
//    }

    /**
     * @param $thisId
     * @return bool
     */
    public static function haveSon($thisId)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT count(*) as record_count FROM user_group WHERE pid='.$thisId);
        $result = $command->queryOne();
        if($result['record_count']>0)
        {
            return true;
        }
        else
            return false;
    }

    /**
     * @return array
     */
    public static function getAllGroupData()
    {
        $connection = \Yii::$app->db;
        $sql_str='SELECT * FROM user_group order by pos';
        $command = $connection->createCommand($sql_str);
        $allGroup = $command->queryAll();
        return $allGroup;
    }


    /**
     * @param $model
     * @return mixed
     */
    public static function generateDefaultValue($model)
    {
        $model->created_at=time();
        $model->updated_at=0;
        $model->status=1;
        return $model;
    }
}