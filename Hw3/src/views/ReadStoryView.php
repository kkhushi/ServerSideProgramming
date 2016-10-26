<?php
namespace cool_name_for_your_group\hw3\views;

use cool_name_for_your_group\hw3\views\View;
use cool_name_for_your_group\hw3\configs\Config;
use cool_name_for_your_group\hw3\views\elements\HeaderElement;
use cool_name_for_your_group\hw3\views\helpers\ReadStoryRatingHelper;
use cool_name_for_your_group\hw3\views\helpers\InitialStoryRatingHelper;
use cool_name_for_your_group\hw3\views\helpers\ContentDisplayHelper;

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
		<?php $this->contentdisplay->render($data['content']);
		
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
