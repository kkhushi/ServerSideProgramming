<?php namespace cool_name_for_your_group\hw3\controllers;

use cool_name_for_your_group\hw3\controllers\Controller;
use cool_name_for_your_group\hw3\views\ReadStoryView;
use cool_name_for_your_group\hw3\models;

class ReadStoryController extends Controller
{
	public $data;
	public $view;
	public function invoke($arg)
	{
		$storyid=$arg[0];
		$this->model->getStory($this,$storyid);
		$this->model->closeConnection();
		$this->view=new ReadStoryView();
		$this->view->render($this->data);
	}
	public function invokeRateStory($arg)
	{
		$storyid=$arg[0];
		$rating=$arg[1];
		$_SESSION['ratedstories'][$storyid]=$rating;
		$this->model->rateStory($storyid,$rating);
		$this->model->closeConnection();
	}
}
