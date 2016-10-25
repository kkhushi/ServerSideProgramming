<?php
namespace cool_name_for_your_group\hw3\views\helpers;
//require_once('Helper.php');
use cool_name_for_your_group\hw3\views\helpers\Helper;
use cool_name_for_your_group\hw3\configs\Config;

class ViewingDisplayHelper extends Helper
{
	public function render($data)
	{ ?>
	<h3>Most Viewed</h3>
	<?php
        if(empty($data))
        {
            ?><p>No story found</p><br/>
	<?php
        }
        else
        {
            ?>
		<ol>
	<?php
            foreach($data as $identifier=>$title)
            {
                ?><li><a href="index.php?c=ReadStoryController&m=invoke&arg1=<?=$identifier?>"><?=$title?></a></li><?php
            
            }
            ?></ol>
	<?php
        }
    }
} ?>
