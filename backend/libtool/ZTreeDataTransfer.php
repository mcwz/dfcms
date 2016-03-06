<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/21
 * Time: 15:18
 */

namespace backend\libtool;


class ZTreeDataTransfer
{
    /**
     * @param $data
     * @param array $keys
     * @param array $openIdArray
     * @return string
     */
    public static function array2simpleJson($data, $keys=array('id','pid','name'), $openIdArray=array())
    {
        $result_array=array();

        if(!is_array($openIdArray))
        {
            $openIdArray=array($openIdArray);
        }

        if(is_array($data) && count($keys)===3)
        {
            $i=0;
            foreach($data as $aNode)
            {
                $allKeyExist=true;
                foreach($keys as $key)
                {
                    if(!array_key_exists($key,$aNode))
                    {
                        $allKeyExist=false;
                    }
                }

                if($allKeyExist)
                {
                    $result_array[$i]['id']=$aNode[$keys[0]];
                    $result_array[$i]['pid']=$aNode[$keys[1]];
                    $result_array[$i]['name']=$aNode[$keys[2]];
                    $result_array[$i]['url']='view?id='.$aNode[$keys[0]];
                    $result_array[$i]['target']='_self';

                    if(in_array($aNode[$keys[0]],$openIdArray))
                    {
                        $result_array[$i]['open']=true;
                    }
                    $i++;
                }
            }
        }

        return json_encode($result_array);
    }



    public static function array2CheckJson($data,$checkedArray, $keys=array('id','pid','name'), $openIdArray=array())
    {
        $result_array=array();

        if(!is_array($openIdArray))
        {
            $openIdArray=array($openIdArray);
        }

        if(is_array($data) && count($keys)===3)
        {
            $i=0;
            foreach($data as $aNode)
            {
                $allKeyExist=true;
                foreach($keys as $key)
                {
                    if(!array_key_exists($key,$aNode))
                    {
                        $allKeyExist=false;
                    }
                }

                if($allKeyExist)
                {
                    $result_array[$i]['id']=$aNode[$keys[0]];
                    $result_array[$i]['pid']=$aNode[$keys[1]];
                    $result_array[$i]['name']=$aNode[$keys[2]];

                    if(in_array($aNode[$keys[0]],$checkedArray))
                    {
                        $result_array[$i]['checked']=true;
                    }
                    if(in_array($aNode[$keys[0]],$openIdArray))
                    {
                        $result_array[$i]['open']=true;
                    }
                    $i++;
                }
            }
        }

        return json_encode($result_array);
    }
}