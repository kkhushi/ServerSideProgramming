<?php
session_start();
require_once("controllers/controllers.php");
require_once("controllers/controllerswrite.php");

if(isset($_REQUEST['c']) && $_REQUEST['c']=="controllerswrite")
{
	$controller=new controllerswrite();
	$methodname=$_REQUEST['m']."()";
	$controller->$methodname;
}
else
{
	$controller=new controllers();
	$controller->render();
}
?>

