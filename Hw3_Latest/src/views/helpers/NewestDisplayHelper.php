<?php
namespace thrill_seekers\hw3\views\helpers;

use thrill_seekers\hw3\views\helpers\Helper;

class NewestDisplayHelper extends Helper
{
	public function render($data)
	{
		?><h3>Newest</h3><?php
        if(empty($data))
        {
            ?><p>No story found</p><br/><?php
        }
        else
        {
            ?>
            <ol>
            <?php
            foreach($data as $identifier=>$title)
            { ?>
                <li><a href="index.php?c=ReadStoryController&m=invoke&arg1=<?= $identifier ?>"><?= $title ?></a></li>
            
        <?php  }
            ?>
            </ol>
        <?php
        }
    }
} ?>

