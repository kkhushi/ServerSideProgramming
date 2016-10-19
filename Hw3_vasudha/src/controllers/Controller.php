<?php
namespace cool_name_for_your_group\hw3\controllers;
use cool_name_for_your_group\hw3\views;


class Controller
{
	public $models;
	public $views;
	
	public function __construct()
	{
		$this->models=new models();
	}
	
	public function callview()
	{
		if(!isset($_REQUEST['c']) && !isset($_REQUEST['phrases']))
		{
			$views=new Landingview();
			$views->render();
		}
	}
}
?>
