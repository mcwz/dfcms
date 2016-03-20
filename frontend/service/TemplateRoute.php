<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/19
 * Time: 14:43
 */

namespace frontend\service;

use backend\models\Content;
use backend\models\Nodes;
use backend\models\Url;
use Yii;
use yii\web\NotFoundHttpException;


class TemplateRoute
{
    const URL_TYPE_ARTICLE=1;//普通文章用这个
    const URL_TYPE_INDEX=2;//列表页用这个，默认可以被下级节点继承
    const URL_TYPE_COVER=3;//首页用这个，不能被下级节点继承

    private $host='localhost';
    private $url='/';
    private $templateConfig;
    private $error;
    private $templatePath='';
    private $url_type;
    private $templateBasePath;

    public function __construct($host_url)
    {
        if(isset($host_url['host'])){
            $this->host=str_replace('.','_',$host_url['host']);
        }
        if(isset($host_url['url'])){
            $this->url=$host_url['url'];
        }
        $this->templateConfig=Yii::$app->params['template'];
        $this->templateBasePath=$this->templateConfig['rootPath'].$this->host.DIRECTORY_SEPARATOR;
        $this->_route();
    }

    public function getErrors()
    {
        return $this->error;
    }
    public function getUrlType()
    {
        return $this->url_type;
    }

    public function getTemplateBasePath()
    {
        return $this->templateBasePath;
    }

    public function getTemplatePath()
    {
        return $this->templateBasePath.$this->templatePath;
    }




    private function _route()
    {
        if(isset($this->templateConfig[$this->host]))
        {
            $hostTemplate=$this->templateConfig[$this->host];

            //首先看看这个Url地址有没有已经特殊定义对应模板
            //后期可能需要处理这个url,使之不包括? #等特殊部分。
            if(isset($hostTemplate['url_defined'][$this->url]))
            {
                $this->templatePath= $hostTemplate['url_defined'][$this->url];
            }
            else
            {
                $urlObj=Url::findOne(['url_hash'=>md5($this->url)]);
                if($urlObj===null)
                {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
                $this->url_type=$urlObj->url_type;
                if($urlObj!=null)
                {
                    $templatePathTemp=$this->_findRealTemplate($urlObj);
                    if(count($templatePathTemp)===1)
                    {
                        $templatePathTemp=array_pop($templatePathTemp);
                    }
                    $this->templatePath=$templatePathTemp;
                }
            }

        }
        else
        {
            $this->error[]=Yii::t('app','There has not matched template host({host}) in the /template/TConfig.php',['host'=>$this->host]);
        }
    }

    /**
     * @param /frontend/models/Url $urlObj
     */
    private function _findRealTemplate($urlObj)
    {
        switch($urlObj->url_type)
        {
            case self::URL_TYPE_ARTICLE:return $this->_getArticleTemplatePath($urlObj);break;
            case self::URL_TYPE_COVER:return $this->_getCoverTemplatePath($urlObj);break;
            case self::URL_TYPE_INDEX:return $this->_getIndexTemplatePath($urlObj);break;
            default:$this->error[]=Yii::t('app','Unknown url type code({code})',['code'=>$urlObj->url_type]);return '';
        }
    }


    private function _getArticleTemplatePath($urlObj)
    {
        $nodes_data=$this->_getNodes($urlObj);
        return $this->_findTPath($nodes_data,self::URL_TYPE_ARTICLE);
    }
    private function _getIndexTemplatePath($urlObj)
    {
        $nodes_data=$this->_getNodes($urlObj);
        return $this->_findTPath($nodes_data,self::URL_TYPE_INDEX);
    }
    private function _getCoverTemplatePath($urlObj)
    {
        $nodes_data=$this->_getNodes($urlObj);
        return $this->_findTPath($nodes_data,self::URL_TYPE_COVER);
    }
    private function _getTemplatePath($urlObj)
    {
        $nodes_data=$this->_getNodes($urlObj);
        return $this->_findTPath($nodes_data);
    }



    private function _findTPath($nodes_data,$foundType=0)
    {
        $return=array();
        if($nodes_data)
        {
            $allNodeTemp=$nodes_data['allNodes'];
            $notFounded=true;
            $foundingNodeId=$nodes_data['nowNode']->id;
            $i=0;
//            echo "<pre>";
            while($notFounded)
            {
//                echo "<pre>$foundingNodeId and now all nodes is:<br>";
//                print_r($allNodeTemp);
                $nodeDepth=count($allNodeTemp);
                if($nodeDepth<=0)
                {
//                    echo "breaking";
//                    print_r($allNodeTemp);
                    break;
                }
                if($i>=$nodeDepth) $i=0;

                if(count($allNodeTemp)==0)exit();
//                echo "<br/>checking $foundingNodeId-<br/>";
//                print_r($allNodeTemp[$i]);
                if($foundingNodeId==$allNodeTemp[$i]['id'])
                {
                    //找文章模板位置
                    if($foundType===self::URL_TYPE_ARTICLE || $foundType===0)
                    {
                        if($allNodeTemp[$i]['article_t_path']!='')
                        {
                            $return['article_t_path']=$allNodeTemp[$i]['article_t_path'];
                            if($foundType>0){$notFounded=false;break;}
                        }
                    }

                    //找封面页模板位置
                    if($foundType===self::URL_TYPE_COVER  || $foundType===0)
                    {
                        if($allNodeTemp[$i]['cover_t_path']!='')
                        {
                            $return['cover_t_path']=$allNodeTemp[$i]['cover_t_path'];
                            if($foundType>0){$notFounded=false;break;}
                        }
                    }

                    //找列表页模板位置
                    if($foundType===self::URL_TYPE_INDEX  || $foundType===0)
                    {
                        if($allNodeTemp[$i]['index_t_path']!='')
                        {
                            $return['index_t_path']=$allNodeTemp[$i]['index_t_path'];
                            if($foundType>0){$notFounded=false;break;}
                        }
                    }
                    $foundingNodeId=$allNodeTemp[$i]['pid'];
                    array_splice($allNodeTemp,$i,1);
                }


                $i++;
            }
        }

        return $return;
    }


    private function _getNodes($urlObj)
    {
        switch($urlObj->url_type)
        {
            case self::URL_TYPE_ARTICLE:
                $content=Content::findOne(['id'=>$urlObj->relate_id]);
                if($content)
                {
                    return ['nowNode'=>Nodes::findOne(['id'=>$content['node_id']]),'allNodes'=>Nodes::getAllParentNodes($content['node_id'])];
                }
                else
                {
                    $this->error[]=Yii::t('app','Url Is not Match an article');
                }
                break;
            case self::URL_TYPE_COVER:
            case self::URL_TYPE_INDEX:
                $node=Nodes::findOne(['id'=>$urlObj->relate_id]);
                if($node)
                {
                    return ['nowNode'=>$node,'allNodes'=>Nodes::getAllParentNodes($urlObj->relate_id)];
                }
                else
                {
                    $this->error[]=Yii::t('app','Url Is not Match a node');
                }
            break;
            default:$this->error[]=Yii::t('app','Unknown url type code({code})',['code'=>$urlObj->url_type]);
        }
        return null;
    }
}