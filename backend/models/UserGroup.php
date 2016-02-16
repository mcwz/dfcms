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
            [['pid', 'path', 'name', 'created_at', 'updated_at', 'pos'], 'required'],
            [['pid', 'created_at', 'updated_at', 'pos'], 'integer'],
            [['path'], 'string', 'max' => 250],
            [['name', 'description'], 'string', 'max' => 200]
        ];
    }
    /**
     * @param boolean $include_default true for key 0 value root group
     */
    public static function getAllGroup($include_default)
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM user_group');
        $allGroup = $command->queryAll();
        $allGroup['0']=Yii::t('app','Choose a Group');
        return $allGroup;
    }
}