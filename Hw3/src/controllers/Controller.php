<?php
namespace thrill_seekers\hw3\controllers;

use thrill_seekers\hw3\models\StoryModel;

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
		$this->data['selectedgenredisplay']['genre']=[];
		$this->data['selectedgenredisplay']['userselected']=[];
		$this->data['story']="";
		$this->data['titlenameerr']="";
		$this->data['authornameerr']="";
		$this->data['identifiernameerr']="";
		$this->data['storyerr']="";
		$this->data['genremultiselecterr']="";

		$this->model=new StoryModel();
	}
}
