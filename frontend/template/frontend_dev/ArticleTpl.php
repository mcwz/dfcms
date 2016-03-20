<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 10:19
 */

namespace frontend\template\frontend_dev;


use frontend\template\TemplateDefineInterface;
use yii\base\Exception;

class ArticleTpl implements TemplateDefineInterface
{

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