<?php

namespace backend\controllers;

use backend\models\AttrGroupAssgin;
use backend\models\Attrs;
use backend\services\attr\AttrFactory;
use backend\models\forms\AssignAttrGroupForm;
use Yii;
use backend\models\AttrGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttrGroupController implements the CRUD actions for AttrGroup model.
 */
class AttrGroupController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AttrGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AttrGroup::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AttrGroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AttrGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AttrGroup();

        $create_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $create_time = time();
            $model->created_at = $create_time;
            $model->updated_at = $create_time;
            $create_flag = $model->save();
        }

        if($create_flag){
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AttrGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $update_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at=time();
            $update_flag=$model->save();
        }
        if($update_flag){
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AttrGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChooseAttr($id)
    {
//        $attr=AttrFactory::build(array("name"=>'namex','type'=>AttrFactory::TYPE_TEXT,'label'=>'名称'),AttrFactory::TYPE_TEXT);
//        echo $attr->getHtmlStr();
        $attrGroup=$this->findModel($id);
        $all_attr=Attrs::getAllAttr();
        $now_assign=AttrGroupAssgin::getAttrGroupAssign($id);
        $now_assign_attrIds=AttrGroupAssgin::processAssign($now_assign);


        $model=new AssignAttrGroupForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            AttrGroupAssgin::assign($model);
            $now_assign=AttrGroupAssgin::getAttrGroupAssign($id);
            $now_assign_attrIds=AttrGroupAssgin::processAssign($now_assign);
        }

        $array_render_data=array('attrGroup'=>$attrGroup,
            'all_attr'=>$all_attr,
            'now_assign'=>$now_assign_attrIds);

        return $this->render('choose-attr',$array_render_data);
    }


    /**
     * Finds the AttrGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AttrGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AttrGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
