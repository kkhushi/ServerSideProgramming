<?php
use cool_name_for_your_group\hw3\controllers;


if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
	$controller=new Controller();
	$controller->callview();
}

else
{
	$controllertocall=$_REQUEST['c']."()";
	$methodtoinvoke=$_REQUEST['m']."()";
	$controller=new $controllertocall;
	$controller->$methodtoinvoke;
}
?>

