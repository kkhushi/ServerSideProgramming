<?php namespace thrill_seekers\hw4\controllers;


use thrill_seekers\hw4\views\LandingView;
use thrill_seekers\hw4\controllers\Controller;

class LandingController extends Controller
{
	public $views;
	public $data;
	public $model;

	public function invoke()
	{
		$this->data['title']="PasteChart";
		$this->data['texttitle']="Chart Title";
		$this->data['placeholder']="Text label,Value1,Value2,..,Valuen";
		$this->callview();
	}
	public function callview()
	{
		$views=new LandingView();
		$views->render($this->data);
	}
}
?>
