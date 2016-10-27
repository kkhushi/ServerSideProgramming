<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class ContentDisplayHelper extends Helper
{
	public function render($data)
	{
		foreach($data as $paragraphcontent)
		{ ?>
			<p><?=$paragraphcontent?></p>
		<?php }
	}
} ?>
