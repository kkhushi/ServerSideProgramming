<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class GenreSingleSelectHelper extends Helper
{
	public function render($data)
	{ ?>
		<select name="genresingleselect">
		<option selected="selected" value="All">All Genres</option>
	<?php	foreach($data as $genrevalue)
		{ ?>
			<option value=<?=$genrevalue?>><?= $genrevalue ?></option>	
	<?php } ?>
		</select>
		
	<?php }

} ?>
