<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/8
 * Time: 11:21
 */

namespace backend\models;


use backend\models\giimodels\ContentBase;

class Content extends ContentBase
{
    const STATUS_EDITING=1;
    const STATUS_SAVED=2;
    const STATUS_FALLBACK=3;
    const STATUS_CHECKING=4;
    const STATUS_PUB=5;
    const STATUS_DELETED=0;
}