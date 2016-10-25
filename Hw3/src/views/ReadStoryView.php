<?php
namespace cool_name_for_your_group\hw3\views;

use cool_name_for_your_group\hw3\views\View;
use cool_name_for_your_group\hw3\configs\Config;
use cool_name_for_your_group\hw3\views\elements\HeaderElement;

class ReadStoryView extends View
{
	public $headersdisplay;
	
	public function __construct()
	{
		$this->headersdisplay=new HeaderElement($this);
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
		Your Rating: <?php $this->displayRating($data['storyid'])?>
		
		<p><?=$data['content']?></p>
		
		
	
	<?php 
	}
	public function displayRating($storyid)
	{
		$ratingdisplay="";
		if(isset($_SESSION['ratedstories'][$storyid]))
		{
			$stories=array_keys($_SESSION['ratedstories']);
			if(in_array($storyid,$stories))
			{
				print("<b>".$_SESSION['ratedstories'][$storyid]."</b>");
			}
		}
		else
		{ ?>

			<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$storyid?>&arg2=1">1</a>|
			<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$storyid?>&arg2=2">2</a>|
			<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$storyid?>&arg2=3">3</a>|
			<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$storyid?>&arg2=4">4</a>|
			<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$storyid?>&arg2=5">5</a>
		<?php }
	}
} ?>
