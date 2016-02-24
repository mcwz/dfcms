<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/24
 * Time: 20:00
 */

namespace backend\widgets;

use yii\base\Widget;
use yii\web\View ;

class ZTreeWidget extends Widget
{
    public $treeData;
    public $selectID;

    public $key = null;
    public $pos = View::POS_END ;

    public function init()
    {
        parent::init();
        if($this->treeData===null)
        {
            $this->treeData='[]';
        }
    }

    public function run()
    {
        $block = $this->render('ZTreeJSView',['treeData'=>$this->treeData,'selectID'=>$this->selectID]);
        $block = trim($block) ;

        $jsBlockPattern  = '|^<script[^>]*>(?P<block_content>.+?)</script>$|is';
        if(preg_match($jsBlockPattern,$block,$matches)){
            $block =  $matches['block_content'];
        }
        $this->view->registerJs($block, $this->pos,$this->key) ;
        return $this->render('ZTreeView');
    }
}