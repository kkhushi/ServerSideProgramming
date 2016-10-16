<?php

class controllers
{
	public $models;
	public $views;
	
	public function __construct()
	{
		$this->models=new models();
	}
	public function render()
	{
		if(!isset($_REQUEST['phrases']))
		{
			include 'views/landing_view.php';
		}
	}
}
