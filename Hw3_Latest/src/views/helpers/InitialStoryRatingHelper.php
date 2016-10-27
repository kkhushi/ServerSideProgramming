<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class InitialStoryRatingHelper extends Helper
{
	public function render($data)
	{
		for($i=1;$i<=5;$i++)
		{ ?>
			|<a href="index.php?c=ReadStoryController&m=invokeRateStory&arg1=<?=$data?>&arg2=<?=$i?>"><?=$i?></a>
		<?php }
	}
} ?>

