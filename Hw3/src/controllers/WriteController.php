<?php
namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\views;
use cool_name_for_your_group\hw3\models;

class WriteController extends Controller
{
	public $data;
	public $datafromwriteform;
	
	public function processForm()
	{
		if(isset($_REQUEST))
		{
			$this->datafromwriteform['genremultiselect']=[];
			$this->datafromwriteform['titlename']=$_REQUEST['titlename'];
			$this->datafromwriteform['authorname']=$_REQUEST['authorname'];
			$this->datafromwriteform['identifiername']=$_REQUEST['identifiername'];
			$this->datafromwriteform['story']=htmlspecialchars($_REQUEST['story']);
			foreach($_REQUEST['genremultiselect'] as $selectedoption)
			{
				array_push($this->datafromwriteform['genremultiselect'],$selectedoption);
			}
			
		}
		
		$this->model->saveNewStory($this->datafromwriteform);
		$this->model->closeConnection();
	}
	
	public function invokewrite()
	{
		$this->data=$this->model->getGenre();
		$this->model->closeConnection();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
}
