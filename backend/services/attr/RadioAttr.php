<?php
namespace backend\services\attr;

class RadioAttr extends AttrBase implements AttrInterFace
{
	public function __construct($data)
	{
		parent::__construct($data);
	}


	public function getHtmlStr()
	{
		if(!is_array($this->label))
		{
			throw new \Exception("Radio data is not an array.");
		}

		foreach($this->label as $aLabelKey=>$aLabelValue)
		{
			$return='<label for="'.$aLabelKey.'"><input type="radio" value="'.$aLabelValue.'" id="'.$this->name.'" name="'.$this->name.'"';
			if($this->value!==null && $aLabelValue)
			{
				$return.=" checked=\"checked\" ";
			}

			$return.="/></label>";
		}


		return $return;
	}

}