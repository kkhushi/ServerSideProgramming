<?php
//namespace cool_name_for_your_group\hw3\views\helpers;
require_once('Helper.php');
require_once('Config.php');
class NewestDisplayHelper extends Helper
{
	public function render($data)
	{
		print("<h3>Newest</h3>");
		if(empty($data))
		{
			print("<p>No story found</p><br/>");
		}
		else
		{
			print("<ol>");
			foreach($data as $identifier=>$title)
			{
				print("<li><a href=".Config::BASE_URL."/index.php?c=ReadStoryController&m=invoke&arg1=".$identifier.">".$title."</a></li>");
			
			}
			print("</ol>");
		}
	}
}
?>
