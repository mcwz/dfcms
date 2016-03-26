<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/26
 * Time: 16:00
 */

namespace backend\hooks\interfaces;


Interface AfterContentCheckCompleteInterface
{
    public function init($param);
    public function run();
}