<?php
namespace thrill_seekers\hw4;

use thrill_seekers\hw4\controllers as C;
use thrill_seekers\hw4\configs\Config;

if(!isset($_REQUEST['c']))
{
	$controller=new C\LandingController();
	$controller->invoke();
} ?>
