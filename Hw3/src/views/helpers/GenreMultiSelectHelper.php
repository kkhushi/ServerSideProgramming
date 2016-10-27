<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class GenreMultiSelectHelper extends Helper
{
	public function render($data)
	{ ?>
		<select class="multiitems" name="genremultiselect[]" multiple="multiple">
	<?php	foreach($data as $genrevalue)
		{ ?>
			<option value=<?=$genrevalue?>><?=$genrevalue?></option>	
	<?php	} ?>
		</select>
		
	<?php }

} ?>
