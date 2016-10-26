<?php
namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\models\StoryModel;

class Controller
{
	public $model;
	public $data;

	public function __construct()
	{
		$this->data=[];
		$this->data['titlename']="";
		$this->data['authorname']="";
		$this->data['identifiername']="";
		$this->data['genre']=[];
		$this->data['genremultiselect']=[];
		$this->data['story']="";

		$this->model=new StoryModel();
	}
}
