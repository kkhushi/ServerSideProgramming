<?php


//use cool_name_for_your_group\hw3\controllers;

require_once('LandingController.php');
require_once('WriteController.php');
if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
	$controller=new LandingController();
	$controller->invoke();
}

else
{
	$controllertocall=$_REQUEST['c'];
	$methodtoinvoke=$_REQUEST['m'];
    switch ($controllertocall) {
        case 'WriteController' :
            $controller=new WriteController();
            break;
        default:
            $controller= new LandingController();
    }
	$controller->invoke();
}
?>

