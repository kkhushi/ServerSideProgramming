<?php

//namespace cool_name_for_your_group\hw3\controllers;


//use cool_name_for_your_group\hw3\views;
//use cool_name_for_your_group\hw3\models;

require_once("Controller.php");
require_once("LandingView.php");

class LandingController extends Controller
{
	public $views;
	public $data;
	public $model;
	public function invoke()
	{
		
		$this->data['genre']=$this->model->getGenre();
		$this->model->closeConnection();
		$this->data['title']="Five Thousand Characters";
		$this->data['placeholder']="Phrase Filter";
		$this->callview();
	}
	public function callview()
	{
		if(!isset($_REQUEST['gobutton']) && !isset($_REQUEST['phrases']))
		{
			$views=new LandingView();
			$views->render($this->data);
		}
	}
}
?>
