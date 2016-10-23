<?php
namespace cool_name_for_your_group\hw3\views\helpers;

class GenreSingleSelectHelper extends Helper
{
	public function render($data)
	{ ?>
		<select name="genresingleselect">
		<option selected="selected" value="All">All Genres</option>
	<?php	foreach($data['genre'] as $genrevalue)
		{ ?>
			<option value=<?=$genrevalue?>><?=$genrevalue?></option>	
	<?php	}?>
		</select>
		
	<?php}

}?>