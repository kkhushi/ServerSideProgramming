<?php
//namespace cool_name_for_your_group\hw3\views\helpers;
require_once('Helper.php');

class ViewingDisplayHelper extends Helper
{
	public function render($data)
	{
		print("<h3>Most Viewed</h3>");
		if(empty($data))
		{
			print("<p>No story found</p><br/>");
		}
	}
}
