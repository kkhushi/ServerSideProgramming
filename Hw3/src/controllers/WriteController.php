<?php
namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\views;
use cool_name_for_your_group\hw3\models;
use cool_name_for_your_group\hw3\views\WriteSomethingView;

//require_once('Controller.php');
//require_once('WriteSomethingView.php');
class WriteController extends Controller
{
	public $data;
	public $datafromwriteform;
	
	public function processForm()
	{
		$success = false;
		if ($_POST) {
			if(isset($_REQUEST))
			{
				if(!empty($_REQUEST['identifiername']) && count(array_filter($_REQUEST))==1)
				{
					//retrieve saved story from database based on identifier and display
				}
				else if (empty($_REQUEST['success']))
				{
					$_SESSION['post-data'] = $_POST;
					
					//Add validation on the data and return error message if data not correct.
					
					$this->datafromwriteform['genremultiselect']=[];
					$this->datafromwriteform['titlename']=$_REQUEST['titlename'];
					$this->datafromwriteform['authorname']=$_REQUEST['authorname'];
					$this->datafromwriteform['identifiername']=$_REQUEST['identifiername'];
					$this->datafromwriteform['story']=htmlspecialchars($_REQUEST['story']);
					
					foreach($_REQUEST['genremultiselect'] as $selectedoption)
					{
						array_push($this->datafromwriteform['genremultiselect'],$selectedoption);
					}

					$success = $this->model->saveNewStory($this->datafromwriteform);
					$this->model->closeConnection();
				}
				else {
					//render as per success msg and reload page from session same as getting saved story
				}
			}
			header('Location: ' . 'http://localhost/Hw3/index.php?c=WriteController&m=invoke&success='.$success);
			exit();
		}
	}

	public function invoke()
	{
		$this->model->getGenre($this);
		$this->model->closeConnection();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
}
