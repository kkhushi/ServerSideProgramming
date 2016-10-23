<?php
namespace cool_name_for_your_group\hw3\views\helpers;

class RatingDisplayHelper extends Helper
{
	public function render($data)
	{
		print("<h3>Highest Rated</h3>");
		if(empty($data))
		{
			print("<p>No story found</p><br/>")
		}
	}
}
