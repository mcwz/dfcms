<?php
namespace frontend\controllers;

use frontend\service\TemplateRoute;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionAllPage()
    {
        $visit_url=\Yii::$app->request->url;
        $visit_url_md5=md5($visit_url);
        $host=$_SERVER['HTTP_HOST'];

        $templateRoute=new TemplateRoute(['host'=>$host,'url'=>$visit_url]);
        if(count($templateRoute->getErrors()))
        {
            print_r($templateRoute->getErrors());
            return '';
        }
        else{
            $templatePath=$templateRoute->getTemplatePath();
            $template_type=$templateRoute->getUrlType();
            $templateDefine=new $templatePath(['url'=>$visit_url_md5]);
            $viewPath=$templateDefine->getViewFilename();
            $viewParams=$templateDefine->getParams();
            $viewParams['templateBasePath']=$templateRoute->getTemplateBasePath();
            return $this->renderFile($viewPath,$viewParams);
        }

    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


}
