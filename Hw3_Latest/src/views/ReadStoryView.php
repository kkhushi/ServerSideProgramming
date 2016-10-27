<?php
namespace thrill_seekers\hw3\views;

use thrill_seekers\hw3\views\View;
use thrill_seekers\hw3\configs\Config;
use thrill_seekers\hw3\views\elements\HeaderElement;
use thrill_seekers\hw3\views\helpers\ReadStoryRatingHelper;
use thrill_seekers\hw3\views\helpers\InitialStoryRatingHelper;
use thrill_seekers\hw3\views\helpers\ContentDisplayHelper;

class ReadStoryView extends View
{
	public $headersdisplay;
	public $existingstoryrating;
	public $newstoryrating;
	public $contentdisplay;
	
	public function __construct()
	{
		$this->headersdisplay=new HeaderElement($this);
		$this->contentdisplay=new ContentDisplayHelper($this);
	}
	public function render($data)
	{
		$data['titledisplay']="Five Thousand Characters -".$data['title'];
		$this->headersdisplay->render($data); ?>
		<body>
		<h1>
			<a href="index.php?c=LandingController&m=invoke">Five Thousand Characters</a> -<?=$data['title']?>
		</h1>
		<div><?=$data['author']?></div>
		Your Rating: <?php $this->displayRating($data) ?> <br />
		Average Rating:<?=$data['averagerating'] ?><br/>
		<?php $this->contentdisplay->render($data['paragraphchunks']);
		
	}
	public function displayRating($data)
	{
		if(isset($data['showuserrating']))
		{
			$this->existingstoryrating=new ReadStoryRatingHelper($this);
			$this->existingstoryrating->render($data['showuserrating']);
		}
		else
		{
			$this->newstoryrating=new InitialStoryRatingHelper($this);
			$this->newstoryrating->render($data['storyid']);
		}
	}
} ?>
