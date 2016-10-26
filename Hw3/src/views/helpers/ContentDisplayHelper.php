<?php namespace cool_name_for_your_group\hw3\views\helpers;
use cool_name_for_your_group\hw3\views\helpers\Helper;

class ContentDisplayHelper extends Helper
{
	public function render($data)
	{
		$formatteddata=\preg_replace('/\r\n/','\n',$data);
		$content=\explode('\n\n',$formatteddata);
		foreach($content as $paragraphcontent)
		{ ?>
			<p><?=$paragraphcontent?></p>
		<?php }
	}
} ?>
