<?php

//namespace cool_name_for_your_group\hw3\controllers;


//use cool_name_for_your_group\hw3\views;
//use cool_name_for_your_group\hw3\models;
session_start();
require_once("Controller.php");
require_once("LandingView.php");
class LandingController extends Controller
{
	public $views;
	public $data;
	public $model;
	public function invoke()
	{
		$this->data['genre']=[];
		$this->model->getGenre($this);
		if(isset($_REQUEST['gobutton']) && isset($_REQUEST['phrases']))
		{
			$_SESSION['phrases']=$_REQUEST['phrases'];
			$_SESSION['genre']=$_REQUEST['genresingleselect'];
		}

		if(isset($_SESSION['phrases']) && isset($_SESSION['genre']))
		{
			$this->model->listStories($this,$_SESSION['phrases'],$_SESSION['genre']);
		}
		else
		{
			$this->model->listStories($this,"","All");
		}

		$this->model->closeConnection();
		$this->data['title']="Five Thousand Characters";
		$this->data['placeholder']="Phrase Filter";
		$this->callview();
	}
	public function callview()
	{
		$views=new LandingView();
		$views->render($this->data);
	}
}
?>
