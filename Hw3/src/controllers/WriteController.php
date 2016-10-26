<?php
namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\views;
use cool_name_for_your_group\hw3\models\StoryModel;
use cool_name_for_your_group\hw3\views\WriteSomethingView;
use cool_name_for_your_group\hw3\configs\Config;

class WriteController extends Controller
{
	public $data;
	
	public function invoke()
	{
		$this->model->getGenre($this);
		$this->model->closeConnection();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
	
	public function processForm()
	{
		if (!empty($_POST))
		{
			$_SESSION['post-data'] = $_POST;
			\header("Location:" .Config::BASE_URL."/index.php?c=WriteController&m=processForm&redirected=1",true,302);
			exit();
		}
		else if(isset($_SESSION['post-data']))
		{
			$storydata=$_SESSION['post-data'];
			
			//if identifier already exists in database display it's contents for editing
			if(!empty($storydata['identifiername']) && count(array_filter($storydata))==2)
			{
				if($this->model->findStory($storydata['identifiername']))
				{
					$this->model->fetchexistingStory($this,$storydata['identifiername']);
				}		
		
			}
			else
			{
				$this->data['titlename']=filter_var($storydata['titlename'], FILTER_SANITIZE_SPECIAL_CHARS);
				$this->data['authorname']=filter_var($storydata['authorname'], FILTER_SANITIZE_SPECIAL_CHARS);
				$this->data['identifiername']=filter_var($storydata['identifiername'], FILTER_SANITIZE_NUMBER_INT);
				data['story']=filter_var($storydata['story'], FILTER_SANITIZE_STRING);
				$this->data['story']=filter_var($data['story'], FILTER_SANITIZE_SPECIAL_CHARS);
					
				foreach($storydata['genremultiselect'] as $selectedoption)
					{
						$selectedoption = filter_var($selectedoption, FILTER_SANITIZE_SPECIAL_CHARS);
						\array_push($this->data['genremultiselect'],$selectedoption);
					}
				
				if($this->model->findStory($storydata['identifiername']))
				{
					$this->model->deleteStory($this->data['identifiername']);
				}
				
				$success = $this->model->saveNewStory($this->data);
			}
			unset($_SESSION['post-data']);
			$this->invoke();
		}
		else
		{
			$this->model->closeConnection();
		}
	}
} ?>
