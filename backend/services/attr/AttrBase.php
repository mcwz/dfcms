<?php
namespace backend\services\attr;

//use app\services\AttrInterFace;

class AttrBase{
	protected $name;
	protected $label;
	protected $value;
	protected $type;
	protected $addOnData;

	public function __construct($data)
	{
		if(!isset($data['name']) || !isset($data['label']) || !isset($data['type']))
		{
			throw new \Exception("name,label,type must contain in the array", 1);
			
		}
		$this->name=$data['name'];
		$this->label=$data['label'];
		$this->type=$data['type'];
		$this->value=isset($data['value'])?$data['value']:null;
		$this->addOnData=isset($data['addOnData'])?$data['addOnData']:null;
	}

	public function getJSONStr()
	{
		$return =array("name"=>$this->name,"value"=>$this->value,"type"=>$this->type,"addOnData"=>$this->addOnData);

		return $return;
	}
	public function setValue($value)
	{
		$this->value=$value;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getAddOnData()
	{
		return $this->addOnData;
	}
}