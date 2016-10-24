<?php
namespace cool_name_for_your_group\hw3\views;

use cool_name_for_your_group\hw3\views\helpers;
use cool_name_for_your_group\hw3\views\View;
use cool_name_for_your_group\hw3\configs\Config;
use cool_name_for_your_group\hw3\views\helpers\GenreSingleSelectHelper;
use cool_name_for_your_group\hw3\views\helpers\RatingDisplayHelper;
use cool_name_for_your_group\hw3\views\helpers\ViewingDisplayHelper;
use cool_name_for_your_group\hw3\views\helpers\NewestDisplayHelper;

//require_once('View.php');
//require_once('Config.php');
//require_once('GenreSingleSelectHelper.php');
//require_once('RatingDisplayHelper.php');
//require_once('ViewingDisplayHelper.php');
//require_once('NewestDisplayHelper.php');
class LandingView extends View
{
	public $singleselectgenre;
	public $ratingdisplay;
	public $viewingdisplay;
	public $newestdisplay;

	public function __construct()
	{
		$this->singleselectgenre=new GenreSingleSelectHelper($this);
		$this->ratingdisplay=new RatingDisplayHelper($this);
		$this->viewingdisplay=new ViewingDisplayHelper($this);
		$this->newestdisplay=new NewestDisplayHelper($this);
	}

	public function render($data)
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<title><?=$data['title']?></title>
		<link rel="stylesheet" type="text/css" href="src/styles/common.css">
		<base href="http://localhost/Hw3/">
    	</head>
		<body>
		<h1><?=$data['title']?></h1>
		<a href="index.php?c=WriteController&m=invoke">Write Something!</a> <br />
		<p> Check out what people are writing...</p>
		<form method="post" action="index.php?c=FilterController&m=invoke&arg1=LandingView">
		<input type="text" placeholder="<?=$data['placeholder']?>" name="phrases" /> <br />
		<?php
		$this->singleselectgenre->render($data['genre']);
		?>
		<input type="submit" value="Go" name="gobutton" /></form>

	<?php
		$this->ratingdisplay->render($data['highestrateddata']);
		$this->viewingdisplay->render($data['mostvieweddata']);
		$this->newestdisplay->render($data['newestdata']);

		?>
		</body>
		</html>
	<?php
	}
}



