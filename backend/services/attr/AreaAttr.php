<?php
namespace backend\services\attr;

class AreaAttr extends AttrBase implements AttrInterFace
{
	public function __construct($data)
	{
		parent::__construct($data);
	}


	public function getHtmlStr()
	{
		$return='<label for="'.$this->name.'">'.$this->label.'<textarea id="'.$this->name.'" name="'.$this->name.'"';
		if($this->value!==null)
		{
			$return.=$this->value;
		}

		$return.="</textarea></label>";

		return $return;
	}

}