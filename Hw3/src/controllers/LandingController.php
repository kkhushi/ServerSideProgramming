<?php
namespace cool_name_for_your_group\hw3\controllers;


use cool_name_for_your_group\hw3\views;
use cool_name_for_your_group\hw3\models;


class LandingController extends Controller
{
	public $views;
	public $data;
	public $model;
	public function invoke()
	{
		$this->data=$this->model->getGenre();
		$this->callview();
	}
	public function callview()
	{
		if(!isset($_REQUEST['gobutton']) && !isset($_REQUEST['phrases']))
		{
			$views=new Landingview();
			$views->render($this->data);
		}
	}
}
?>
