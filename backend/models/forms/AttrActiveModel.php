<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/10
 * Time: 13:49
 */

namespace backend\models\forms;


use yii\base\Model;

class AttrActiveModel extends Model
{
    private $rules;
    private $labels;
    private $data=array();

    public function __construct($model_Attr,$config=[])
    {
        parent::__construct($config);
        if(isset($model_Attr['rules']) && is_array($model_Attr['rules']))
        {
            $this->rules=$model_Attr['rules'];
        }
        else
            $this->rules=array();

        if(isset($model_Attr['labels']) && is_array($model_Attr['labels']))
        {
            $this->labels=$model_Attr['labels'];
        }
        else
            $this->labels=array();

        if(isset($model_Attr['array_attrName']) && is_array($model_Attr['array_attrName']))
        {
            foreach($model_Attr['array_attrName'] as $oneAttr)
            {
                $this->data[$oneAttr]='';
            }
        }
    }

    /**
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return $this->labels;
    }



    public function  __set ( $name ,  $value )
    {
        $this -> data [ $name ] =  $value ;
    }

    public function  __get ( $name )
    {
        //echo  "Getting ' $name '\n" ;
        if ( array_key_exists ( $name ,  $this -> data )) {
            return  $this -> data [ $name ];
        }

//        $trace  =  debug_backtrace ();
//        trigger_error (
//            'Undefined property via __get(): '  .  $name  .
//            ' in '  .  $trace [ 0 ][ 'file' ] .
//            ' on line '  .  $trace [ 0 ][ 'line' ],
//            E_USER_NOTICE );
        return  null ;
    }


    public function __toString()
    {
        return json_encode($this->data);
    }

}