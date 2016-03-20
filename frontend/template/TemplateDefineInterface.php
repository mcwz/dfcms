<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 10:16
 */

namespace frontend\template;


Interface TemplateDefineInterface
{
    public function getViewFilename();
    public function getParams();
}