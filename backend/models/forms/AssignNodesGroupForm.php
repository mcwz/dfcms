<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * Login form
 */
class AssignNodesGroupForm extends Model
{
    public $nodeId;
    public $groupsId;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['nodeId', 'required'],
            ['groupsId', 'safe'],
            ['nodeId', 'number'],
            ['groupsId', 'groupIdIsNumArray'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nodeId' => Yii::t('app', 'Node'),
            'groupsId' => Yii::t('app', 'User Group To Choose'),
        ];
    }

    /**
     * @return bool
     */
    public function groupIdIsNumArray()
    {
        foreach($this->groupsId as $groupId)
        {
            if(!is_numeric($groupId))
            {
                return false;
            }
        }
        return true;
    }
}
