<?php
namespace cool_name_for_your_group\hw3\views;

use cool_name_for_your_group\hw3\views\helpers;
use cool_name_for_your_group\hw3\views\View;
use cool_name_for_your_group\hw3\configs\Config;
use cool_name_for_your_group\hw3\views\helpers\GenreSingleSelectHelper;
use cool_name_for_your_group\hw3\views\helpers\RatingDisplayHelper;
use cool_name_for_your_group\hw3\views\helpers\ViewingDisplayHelper;
use cool_name_for_your_group\hw3\views\helpers\NewestDisplayHelper;
use cool_name_for_your_group\hw3\views\elements\HeaderElement;

class LandingView extends View
{
	public $singleselectgenre;
	public $ratingdisplay;
	public $viewingdisplay;
	public $newestdisplay;
	public $headersdisplay;

	public function __construct()
	{
		$this->singleselectgenre=new GenreSingleSelectHelper($this);
		$this->ratingdisplay=new RatingDisplayHelper($this);
		$this->viewingdisplay=new ViewingDisplayHelper($this);
		$this->newestdisplay=new NewestDisplayHelper($this);
		$this->headersdisplay=new HeaderElement($this);
	}

	public function render($data)
	{
		$this->headersdisplay->render($data); ?>
		<body>
		<h1><?=$data['title']?></h1>
		<a href="index.php?c=WriteController&m=invoke">Write Something!</a> <br />
		<p> Check out what people are writing...</p>
		<form method="get" action="index.php?c=LandingController&m=invoke">
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



