<?php

namespace backend\controllers;

use backend\models\CategoryTreepaths;
use backend\services\error\FlashError;
use Yii;
use backend\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AttrGroup;
use backend\models\NodeAttrGroup;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $allCategory=Category::getAllCategoryToZtreeData();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'allCategory'=>$allCategory,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid=1)
    {
        $model = new Category();
        $allCategory=Category::getAllCategoryToZtreeData();
        $createFlag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->pos = 1;
            $model->created_at = $model->updated_at = time();
            $model->status = 1;

            $db=Yii::$app->db;
            $transaction = $db->beginTransaction();

            try {
                $createFlag = $model->save();
                if($createFlag)
                {
                    CategoryTreepaths::create($model->id,$pid);
                }
                $transaction->commit();
            } catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
        if($createFlag)
        {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'pid'=>$pid,
                'allCategory'=>$allCategory,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $allCategory=Category::getAllCategoryToZtreeData();
        $updateFlag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $updateFlag = $model->save();
        }
        if($updateFlag){
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'allCategory'=>$allCategory,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        if($model->id>1)
        {
            $db=Yii::$app->db;
            $transaction = $db->beginTransaction();

            try {

                Category::deleteCategoryDescendant($id);
                $model->delete();
                $transaction->commit();
            } catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
        else
        {
            FlashError::setFlashError(Yii::t('app','Root Category Can not be deleted.'));
        }


        return $this->redirect(['view?id=1']);
    }


    public function actionAssignAttrGroup($id)
    {
        $node=$this->findModel($id);
        $attr_groups=AttrGroup::getAttrGroups();
        $node_attr_group=Category::getAssignedAttrGroup($id);

        $allNodesJson=json_encode(Category::getAllCategoryToZtreeData());

        $model=new NodeAttrGroup();

        if($model->load(Yii::$app->request->post()))
        {
            Category::deleteOldAttrGroupAssign($id);
            $model->created_at=time();
            $model->save();
            $node_attr_group=Category::getAssignedAttrGroup($id);
            Yii::info( Yii::t('app/log', "Assign attrGroup(attrGroup id:{attr_group_id}) to node(category name:{nodeName})", ['attrGroupName' =>$model->attr_group_id,'nodeName'=>$node->name]), 'operations');
        }


        $array_data=array('node'=>$node,'attr_group'=>$attr_groups,'node_attr_group'=>$node_attr_group,
            'allNodes'=>$allNodesJson);
        return $this->render('assign-attr-group',$array_data);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
