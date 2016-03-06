<?php
namespace backend\services\attr;

class TextAttr extends AttrBase implements AttrInterFace
{
	public function __construct($data)
	{
		parent::__construct($data);
	}


	public function getHtmlStr()
	{
		$return='<label for="'.$this->name.'">'.$this->label.'<input type="text" id="'.$this->name.'" name="'.$this->name.'"';
		if($this->value!==null)
		{
			$return.=' value="'.$this->value.'" ';
		}

		$return.=" /></label>";

		return $return;
	}

}