<?php namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class GenreMultiSelectHelper extends Helper
{
	public function render($data)
	{ ?>
		<select class="multiitems" name="genremultiselect[]" multiple="multiple">
	<?php	foreach($data['genre'] as $genrevalue)
		{ 
			if(empty($data['userselected']))
			{ ?>
			<option value=<?=$genrevalue?>><?=$genrevalue?></option>
		<?php	} 
			else
			{
				if(in_array($genrevalue,$data['userselected']))
				{ ?>
					<option value=<?=$genrevalue?> selected="selected"><?=$genrevalue?></option>

				<?php }
				else
				{ ?>
					<option value=<?=$genrevalue?>><?=$genrevalue?></option>

				<?php }	
			}	
		} ?>
		</select>
		
	<?php }

} ?>
