<?php session_start();

class controllerswrite
{
	public $models;
	public $views;
	
	public function __construct()
	{
		$this->models=new models();
	}
	public function render()
	{
		
		
			include 'views/write_something.php';
		
	}
}
