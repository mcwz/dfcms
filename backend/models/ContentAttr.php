<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/8
 * Time: 11:21
 */

namespace backend\models;


use backend\models\giimodels\ContentAttrBase;

class ContentAttr extends ContentAttrBase
{
    /**
     * @param $id
     * @return ContentAttr
     */
    public static function getByContentId($id)
    {
        $contentAttr=new ContentAttr();
        $contentAttrTemp=\Yii::$app->db->createCommand("SELECT content_id,content, CAST(attr as CHAR) as attr FROM content_attr WHERE content_id=".$id)->queryOne();

        if($contentAttrTemp)
        {
            $contentAttr->content_id=$contentAttrTemp['content_id'];
            $contentAttr->content=$contentAttrTemp['content'];
            $contentAttr->attr=$contentAttrTemp['attr'];
        }

        return $contentAttr;
    }

    /**
     * @param $model
     * @return int
     * @throws \yii\db\Exception
     */
    public static function updateContentAttr($model)
    {
        $command=\Yii::$app->db->createCommand()->update('content_attr', ['content' => $model->content,'attr'=>$model->attr], 'content_id = '.$model->content_id);
        return $command->execute();
    }
}