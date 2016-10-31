<?php
namespace thrill_seekers\hw3\controllers;

use thrill_seekers\hw3\views;
use thrill_seekers\hw3\models\StoryModel;
use thrill_seekers\hw3\views\WriteSomethingView;
use thrill_seekers\hw3\configs\Config;

class WriteController extends Controller
{
	public $data;
	
	public function invoke()
	{
		$this->model->getGenre($this);
		$this->data['selectedgenredisplay']['genre']=$this->data['genre'];
		foreach($this->data['genremultiselect'] as $selectedgenrename)
		{
			$this->data['selectedgenredisplay']['userselected'][]=$selectedgenrename;
		}
		$this->model->closeConnection();
		$view=new WriteSomethingView();
		$view->render($this->data);		
	}
	
	public function validateUserData()
	{ 
		$result=true;
		$identifierempty=false;
		if(strlen($this->data['identifiernameerr']=(empty($this->data['identifiername']))?"Identifier cannot be empty":"")>0)
		{
			$result=false;
			$identifierempty=true;
		}
		if(!$identifierempty && strlen($this->data['identifiernameerr']=(strlen($this->data['identifiername']) > intval(Config::MAX_IDENTIFIER_LENGTH))?"Identifier length exceeds maximum limit":"")>0)
		{
			 $result=false;
		}
		if(strlen($this->data['authornameerr']=(strlen($this->data['authorname']) > intval(Config::MAX_AUTHOR_LENGTH))?"Author name length exceeds maximum limit":"")>0) $result=false;
		if(strlen($this->data['titlenameerr']=(strlen($this->data['titlename']) > intval(Config::MAX_TITLE_LENGTH))?"Story title length exceeds maximum limit":"")>0) $result=false;
		if(strlen($this->data['storyerr']=(strlen($this->data['story']) > intval(Config::MAX_STORY_LENGTH))?"Story length exceeds maximum limit":"")>0) $result=false;
		if(strlen($this->data['genremultiselecterr']=(empty($this->data['genremultiselect']))?"Error. Select atleast one genre":"")>0) $result=false;
		
	
		return $result;
		
	}

	public function processForm()
	{
		if (!empty($_POST))
		{
			$_SESSION['post-data'] = $_POST;
			\header("Location:" .Config::BASE_URL."/index.php?c=WriteController&m=processForm&redirected=1",true,302);
			exit();
		}
		else
		{
			//After redirect the data is processed in get mode and saved to database
			if(isset($_SESSION['post-data']))
			{
				$storydata=$_SESSION['post-data'];
			
				//if identifier already exists in database display it's contents for editing
				//Make sure the identifier length is appropriate
				$invalididentifier=false;
				if(strlen($this->data['identifiernameerr']=(strlen($storydata['identifiername']) > intval(Config::MAX_IDENTIFIER_LENGTH))?"Identifier length exceeds maximum limit":"")>0)
				{
			 		$invalididentifier=true;
				}
				
				if(!$invalididentifier && !empty($storydata['identifiername']) && count(array_filter($storydata))==2)
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
					$this->data['identifiername']=filter_var($storydata['identifiername'],FILTER_SANITIZE_SPECIAL_CHARS);
					$this->data['story']=filter_var($storydata['story'], FILTER_SANITIZE_SPECIAL_CHARS);
					
					if(isset($storydata['genremultiselect']))
					{
						foreach($storydata['genremultiselect'] as $selectedoption)
							{
								\array_push($this->data['genremultiselect'],$selectedoption);
							}
					}
					//Check if data adheres to character limits and it so save it in database. Else, throw error to user. Also this is called within the GET scenario and not when back button is pressed. This is to prevent update to database on back button and asking for resubmit.
					if($this->validateUserData())
					{
						if($this->model->findStory($storydata['identifiername']))
						{
							$this->model->deleteStory($this->data['identifiername']);
						}
			
					$success = $this->model->saveNewStory($this->data);
						
					}
				}
				unset($_SESSION['post-data']);
			}
			
			////do database inserts only in the redirected view and not when back is pressed. 
			$this->invoke();
		}		
	}
} ?>
