<?php namespace cool_name_for_your_group\hw3\views\helpers;

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
}
