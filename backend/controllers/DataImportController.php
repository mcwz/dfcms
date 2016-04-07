<?php

namespace backend\controllers;

use backend\models\Content;
use backend\models\ContentAttr;
use Yii;
use yii\web\Controller;

/**
 * DataImportController for import datas
 */
class DataImportController extends Controller
{
    public function beforeAction($action)
    {
        $action->controller->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionContentImport()
    {
        $param = Yii::$app->request->post();
        $errors = array();
        if (isset($param['Content']) && isset($param['ContentAttr'])) {
            $contentModel = new Content();
            $contentAttrModel = new ContentAttr();
            if ($contentModel->load($param) && $contentAttrModel->load($param)) {
                if (is_null(json_decode($contentAttrModel->attr))) {
                    array_push($errors, Yii::t('app', 'contentAttr attr must be a json string.'));
                } else {
                    $connection = Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    try {
                        $renderJson = '';
                        if ($contentModel->save()) {
                            $contentAttrModel->content_id = $contentModel->id;
                            if ($contentAttrModel->save()) {
                                $renderJson = $this->renderPartial('result', ['status' => true]);
                            } else {
                                $errors = array_merge($contentModel->getErrors(), $contentAttrModel->getErrors());
                                //$contentModel->delete();
                            }
                        }
                        $transaction->commit();
                        return $renderJson;
                    } catch (\Exception $e) {
                        array_push($errors, $e->getMessage());
                        $transaction->rollBack();
                    }
                }

            } else {
                array_push($errors, Yii::t('app', 'Problems occurred when loading content and contentAttr.'));
            }
        } else {
            array_push($errors, Yii::t('app', 'Please post content and contentAttr.'));
        }
        return $this->renderPartial('result', ['status' => false, 'errors' => $errors]);
    }
}
