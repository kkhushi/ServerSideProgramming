<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class ReadStoryRatingHelper extends Helper
{
	public function render($data)
	{
		for($i=1;$i<=5;$i++)
		{
			if($i==$data)
			{ ?>
				<b><?= $i ?></b>
				
			<?php }
			else
			{ 
				print($i." ");
			}
		}
	}
} ?>
