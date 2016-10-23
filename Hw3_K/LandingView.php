<?php
//namespace cool_name_for_your_group\hw3\views;

//use cool_name_for_your_group\hw3\views\helpers;

require_once('View.php');
require_once('GenreSingleSelectHelper.php');
require_once('RatingDisplayHelper.php');
require_once('ViewingDisplayHelper.php');
require_once('NewestDisplayHelper.php');
class LandingView extends View
{
	public $singleselectgenre;
	public $ratingdisplay;
	public $viewingdisplay;
	public $newestdisplay;
	public $highestrateddata;
	public $mostvieweddata;
	public $newestdata;
	const BASE_URL = "http://localhost/Hw3";


	public function __construct()
	{
		$this->singleselectgenre=new GenreSingleSelectHelper($this);
		$this->ratingdisplay=new RatingDisplayHelper($this);
		$this->viewingdisplay=new ViewingDisplayHelper($this);
		$this->newestdisplay=new NewestDisplayHelper($this);
		$this->highestrateddata=[];
		$this->mostvieweddata=[];
		$this->newestdata=[];
	}

	public function render($data)
	{
		print("<!DOCTYPE html>
		<html>
		<head><title>{$data['title']}</title></head>
		<body>
		<h1>{$data['title']}</h1>
		<a href=index.php?c=WriteController&m=invoke>Write Something!</a> <br />
		<p> Check out what people are writing...</p>
		<form method=\"post\" action=".BASE_URL."/index.php?c=FilterController&m=invoke&arg1=LandingView>
		<input type=\"text\" placeholder={$data['placeholder']} name=\"phrases\" /> <br />");
		
		$this->singleselectgenre->render($data['genre']);
		print("<input type=\"submit\" value=\"Go\" name=\"gobutton\" /></form>");


		$this->ratingdisplay->render($this->highestrateddata);
		$this->viewingdisplay->render($this->mostvieweddata);
		$this->newestdisplay->render($this->newestdata);

		print("</body></html>");

	}
}




