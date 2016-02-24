<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/23
 * Time: 15:13
 */

namespace backend\libtool;


class UpdateModelPath
{
    private $thisModel;
    private $allSonModel;

    public function __construct($model,$sonModels)
    {
        $this->thisModel=$model;
        $this->allSonModel=$sonModels;
    }

    public function update()
    {
        $this->process();
    }

    private function process($aModel,$nowPath)
    {
        if(count($this->allSonModel)>0)
        {
            foreach($this->allSonModel as $aSonModel)
            {
                if($aSonModel['pid']==$aModel['id'])
                {
                    //update this path
                }
            }
        }
    }
}