<?php namespace thrill_seekers\hw3\controllers;

use thrill_seekers\hw3\controllers\Controller;
use thrill_seekers\hw3\views\ReadStoryView;
use thrill_seekers\hw3\models;

class ReadStoryController extends Controller
{
	public $data;
	public $view;
	public function invoke($arg)
	{
		$storyid=$arg[0];
		$this->model->getStory($this,$storyid);
		$this->model->closeConnection();
		//check if story is rated and if so set appropriate values
		if(isset($_SESSION['ratedstories'][$storyid]))
		{
			$this->data['showuserrating']=$_SESSION['ratedstories'][$storyid];
		}
		$formatteddata=\preg_replace("/\r\n/","\n",$this->data['content']);
		$this->data['paragraphchunks']=\explode("\n\n",$formatteddata);
		$this->view=new ReadStoryView();
		$this->view->render($this->data);
	}
	public function invokeRateStory($arg)
	{
		if(count($arg)!=2)
		{
			print("Error!Cannot rate. Insufficient arguments passed");
		}
		else
		{
			$storyid=$arg[0];
			$rating=$arg[1];
			$_SESSION['ratedstories'][$storyid]=$rating;
			$this->model->rateStory($this,$storyid,$rating);
			$this->model->closeConnection();
			$this->data['showuserrating']=$_SESSION['ratedstories'][$storyid];
			$formatteddata=\preg_replace("/\r\n/","\n",$this->data['content']);
			$this->data['paragraphchunks']=\explode("\n\n",$formatteddata);
			$this->view=new ReadStoryView();
			$this->view->render($this->data);
		}
	}
}
