<?php
//namespace cool_name_for_your_group\hw3\controllers;

//use cool_name_for_your_group\hw3\models;

require_once('StoryModel.php');
class Controller
{
	public $model;
	public function __construct()
	{
		$this->model=new StoryModel();
	}
}
