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
    public $expandAll=false;
    public $treeName="tree";

    //表单相关
    public $isForm=false;
    public $checkedArray=array();

    public $key = null;
    public $pos = View::POS_END ;

    private $renderData=array();

    public function init()
    {
        parent::init();
        if($this->treeData===null)
        {
            $this->treeData='[]';
        }

        $this->renderData=array('treeData'=>$this->treeData,
            'selectID'=>$this->selectID,
            'expandAll'=>$this->expandAll,
            'treeName'=>$this->treeName,
            'isForm'=>$this->isForm,
            'checkArray'=>$this->checkedArray);
    }

    public function run()
    {
        $block = $this->render('ZTreeJSView', $this->renderData);
        $block = trim($block) ;

        $jsBlockPattern  = '|^<script[^>]*>(?P<block_content>.+?)</script>$|is';
        if(preg_match($jsBlockPattern,$block,$matches)){
            $block =  $matches['block_content'];
        }
        $this->view->registerJs($block, $this->pos,$this->key) ;
        return $this->render('ZTreeView', $this->renderData);
    }
}