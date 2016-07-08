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