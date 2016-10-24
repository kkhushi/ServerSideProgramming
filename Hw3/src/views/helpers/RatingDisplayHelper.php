<?php
namespace cool_name_for_your_group\hw3\views\helpers;
//require_once('Helper.php');
use cool_name_for_your_group\hw3\views\helpers\Helper;
use cool_name_for_your_group\hw3\configs\Config;

class RatingDisplayHelper extends Helper
{
	public function render($data)
	{
		print("<h3>Highest Rated</h3>");
        if(empty($data))
        {
            print("<p>No story found</p><br/>");
        }
        else
        {
            print("<ol>");
            foreach($data as $identifier=>$title)
            {
            ?>
            <li><a href="index.php?c=ReadStoryController&m=invoke&arg1=<?=$identifier?>"><?=$title?></a></li>
            <?php
            }
            print("</ol>");
        }
    }
}
?>