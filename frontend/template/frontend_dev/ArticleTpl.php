<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 10:19
 */

namespace frontend\template\frontend_dev;

use backend\models\Content;
use backend\models\ContentAttr;
use frontend\template\TemplateDefineInterface;
use yii\web\NotFoundHttpException;
use backend\models\Url;

class ArticleTpl implements TemplateDefineInterface
{
    private $content;
    private $content_attr;
    public function __construct($param=array())
    {
        if(isset($param['url']))
        {
            $urlTemp=Url::findOne(['url_hash'=>$param['url']]);
            if($urlTemp)
            {
                $this->content=Content::findOne(['id'=>$urlTemp->relate_id]);
                $this->content_attr=ContentAttr::findOne(['content_id'=>$urlTemp->relate_id]);
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
        return array('content'=>$this->content,'content_attr'=>$this->content_attr);
    }
}