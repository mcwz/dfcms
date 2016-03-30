<?php

namespace backend\controllers;

use backend\models\AttrGroup;
use backend\models\NodeAttrGroup;
use backend\models\UserGroup;
use backend\services\error\FlashError;
use Yii;
use backend\models\Nodes;
use backend\models\search\NodesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\libtool\ZTreeDataTransfer;
use backend\models\forms\AssignNodesGroupForm;

/**
 * NodesController implements the CRUD actions for Nodes model.
 */
class NodesController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->checkRBAC("nodeModule");
    }
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
     * Lists all Nodes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NodesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allNodes'=>$allNodesJson,
        ]);
    }

    /**
     * Displays a single Nodes model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'allNodes'=>$allNodesJson
        ]);
    }

    /**
     * Creates a new Nodes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid=1)
    {
        $model = new Nodes();

        //获得父级节点
        $pModel=$this->findModel($pid);

        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);

        $save_flag=false;

        if ($model->load(Yii::$app->request->post()) ) {
            $model->status=1;
            $model->created_at=time();
            $model->updated_at=$model->created_at;
            if($model->save())
            {
                $save_flag=true;
            }
        }
        if($save_flag)
        {
            Yii::info( Yii::t('app/log', "Create node(node name:{nodeName})", ['nodeName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            $model->pid=$pModel->id;
            return $this->render('create', [
                'model' => $model,
                'allNodes'=>$allNodesJson,
                'pModel'=>$pModel,
            ]);
        }
    }

    /**
     * Updates an existing Nodes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //获得父级节点
        $pModel=$this->findModel($model->pid);
        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);

        $update_flag=false;
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at=time();
            if($model->save())
            {
                $update_flag=true;
            }

        }
        if($update_flag)
        {
            Yii::info( Yii::t('app/log', "Update node(node name:{nodeName})", ['nodeName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'allNodes'=>$allNodesJson,
                'pModel'=>$pModel
            ]);
        }
    }


    public function actionAssignGroups($id)
    {
        $model=new AssignNodesGroupForm();
        $nodeModel=$this->findModel($id);
        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);
        $checkedArray=Nodes::getGroupsByNodeId($nodeModel->id);
        $allGroups=UserGroup::getAllGroupData();
        $allGroupsJson=ZTreeDataTransfer::array2CheckJson($allGroups,$checkedArray);

        if ($model->load(Yii::$app->request->post())) {
            $nodeId=$nodeModel->id;
            $groupId=$model->groupsId===null?array():$model->groupsId;
            Nodes::assignUserGroups($nodeId,$groupId);
            Yii::info( Yii::t('app/log', "Assign Node(node name:{nodeName}) To Groups(Groups:{groups})", ['nodeName' =>$model->name,'groups'=>json_encode($groupId)]), 'operations');
            return $this->redirect(['assign-groups', 'id' => $nodeModel->id]);
        } else {
            return $this->render('assign-nodes', [
                'model' => $model,
                'allNodes'=>$allNodesJson,
                'nodeModel'=>$nodeModel,
                'allGroups'=>$allGroupsJson,
            ]);
        }
    }

    public function actionAssignAttrGroup($id)
    {
        $node=$this->findModel($id);
        $attr_groups=AttrGroup::getAttrGroups();
        $node_attr_group=Nodes::getAssignedAttrGroup($id);

        $allNodes=Nodes::getAllNodesData();
        $allNodesJson=ZTreeDataTransfer::array2simpleJson($allNodes);

        $model=new NodeAttrGroup();

        if($model->load(Yii::$app->request->post()))
        {
            Nodes::deleteOldAttrGroupAssign($id);
            $model->created_at=time();
            $model->save();
            $node_attr_group=Nodes::getAssignedAttrGroup($id);
            Yii::info( Yii::t('app/log', "Assign attrGroup(attrGroup id:{attr_group_id}) to node(node name:{nodeName})", ['attrGroupName' =>$model->attr_group_id,'nodeName'=>$node->name]), 'operations');
        }


        $array_data=array('node'=>$node,'attr_group'=>$attr_groups,'node_attr_group'=>$node_attr_group,
            'allNodes'=>$allNodesJson);
        return $this->render('assign-attr-group',$array_data);
    }

    /**
     * Deletes an existing Nodes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $deletefrom
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id,$deletefrom='index')
    {
        $model=$this->findModel($id);
        if(Nodes::checkHaveSon($id)>0)
        {
            FlashError::setFlashError(Yii::t('app',"You can't delete this node because it has one or more son." ));
        }
        else
        {
            Yii::info( Yii::t('app/log', "Delete node(node name:{nodeName},node id:{nodeId})", ['nodeName' =>$model->name,'nodeId'=>$model->id]), 'operations');
            $model->delete();
        }
        if(!in_array($deletefrom,array('index','view')))
            $deletefrom='index';
        if($deletefrom=='view')
        {
            $deletefrom='view?id='.$id;
        }
        return $this->redirect([$deletefrom]);
    }

    /**
     * Finds the Nodes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Nodes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nodes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
