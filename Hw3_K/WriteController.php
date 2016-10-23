<?php
//namespace cool_name_for_your_group\hw3\controllers;

//use cool_name_for_your_group\hw3\views;
//use cool_name_for_your_group\hw3\models;

require_once('Controller.php');
require_once('WriteSomethingView.php');
class WriteController extends Controller
{
	public $data;
	public $datafromwriteform;
	
	public function processForm()
	{
		if(isset($_REQUEST))
		{
			if(!empty($_REQUEST['identifiername']) && count(array_filter($_REQUEST))==1)
			{
				//retrieve saved story from database based on identifier and display
			}
			else
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
			
		
				$this->model->saveNewStory($this->datafromwriteform);
				$this->model->closeConnection();
			}
		}
	}
	
	public function invoke()
	{
		$this->data=$this->model->getGenre();
		$this->model->closeConnection();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
}
