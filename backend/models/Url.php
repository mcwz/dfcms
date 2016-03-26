<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/19
 * Time: 18:02
 */

namespace backend\models;


use backend\models\giimodels\UrlBase;

class Url extends UrlBase
{
    const URL_TYPE_ARTICLE=1;//普通文章用这个
    const URL_TYPE_INDEX=2;//列表页用这个，默认可以被下级节点继承
    const URL_TYPE_COVER=3;//首页用这个，不能被下级节点继承
}