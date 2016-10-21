<?php
namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\views;


class WriteController extends Controller
{
	public $model;
	public $view;
	public $data;
	public $datafromwriteform;
	
	public function processsForm()
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
		
	}
	
	public function invokewrite()
	{
		$this->data=$this->model->getGenre();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
}
