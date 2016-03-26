<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 10:19
 */

namespace frontend\template\frontend_dev;


use backend\models\Content;
use backend\models\Nodes;
use frontend\template\TemplateDefineInterface;
use backend\models\Url;

class IndexTpl implements TemplateDefineInterface
{
    private $node;
    private $articleList;

    public function __construct($param=array())
    {
        if(isset($param['url']))
        {
            $urlTemp=Url::findOne(['url_hash'=>$param['url']]);
            if($urlTemp)
            {
                $this->node=Nodes::findOne(['id'=>$urlTemp->relate_id]);
                /////////////////
            }
            else
            {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }

    public function getViewFilename()
    {
        $viewName=dirname(__FILE__).'\\'.basename(__FILE__,'.php').'.view.php';
        return $viewName;
    }

    public function getParams()
    {
        return array('p1'=>'aa','p2'=>'bb');
    }
}