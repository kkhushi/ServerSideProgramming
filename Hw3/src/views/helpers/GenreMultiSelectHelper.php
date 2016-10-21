<?php
namespace cool_name_for_your_group\hw3\views\helpers;

class GenreMultiSelectHelper extends Helper
{
	public function render($data)
	{ ?>
		<select name="genremultiselect" multiple="multiple">
		<option selected="selected" value="All">All</option>
	<?php	foreach($data['genre'] as $genrevalue)
		{ ?>
			<option value=<?=$genrevalue?>><?=$genrevalue?></option>	
	<?php	}?>
		</select>
		
	<?php}

}?>
