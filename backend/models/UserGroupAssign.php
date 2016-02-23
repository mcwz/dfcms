<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/23
 * Time: 9:45
 */

namespace backend\models;


use backend\models\giimodels\UserGroupAssignBase;

class UserGroupAssign extends UserGroupAssignBase
{

    /**
     * @param $userId
     * @return array
     */
    public static function getUserGroupAssign($userId)
    {
        $connection = \Yii::$app->db;
        $sql_str='SELECT * FROM user_group_assign where user_id='.$userId;
        $command = $connection->createCommand($sql_str);
        $allGroup = $command->queryAll();
        return $allGroup;
    }

    /**
     * @param $userId
     * @param $userGroupAssign
     * @throws \yii\db\Exception
     */
    public static function setUserGroupAssign($userId, $userGroupAssign)
    {
        $connection = \Yii::$app->db;
        $now=time();

        $sql_delete='DELETE FROM user_group_assign WHERE user_id='.$userId;
        $insert_array=array();
        if(is_array($userGroupAssign))
        {
            foreach($userGroupAssign as $uga)
            {
                $insert_array[]=array($userId,$uga,$now);
            }
        }


       $transaction = $connection->beginTransaction();
       try {
            $connection->createCommand($sql_delete)->execute();
            $sql=$connection->createCommand()->batchInsert('user_group_assign', ['user_id', 'group_id','created_at'], $insert_array)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
        }
    }
}