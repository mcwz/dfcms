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
        $model->updated_at=time();
        $model->status=1;
        return $model;
    }

    /**
     * @param $userId
     * @return array|null
     */
    public static function getUserGroupsByUserId($userId)
    {
        if(is_numeric($userId))
        {
            $sql="SELECT * FROM user_group_assign where user_id=".$userId;
            return Yii::$app->db->createCommand($sql)->queryAll();
        }
        return null;
    }
}