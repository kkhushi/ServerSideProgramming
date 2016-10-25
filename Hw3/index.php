<?php
namespace cool_name_for_your_group\hw3;

use cool_name_for_your_group\hw3\controllers as C;
use cool_name_for_your_group\hw3\configs\Config;

session_start();
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'cool_name_for_your_group\\hw3';
    $len = strlen($prefix);
    $relative_class = substr($class, $len);
    
    // Uncomment below if you get class not found, it will show all the autoloaded classes
    //echo "$relative_class <br />"; 
   
    $unixify_class_name = "/".str_replace('\\', '/', $relative_class) .
        '.php';
    $file = 'src' . $unixify_class_name;
    if (file_exists($file)) {
        require_once $file;
    }
});
if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
	$controller=new C\LandingController();
	$controller->invoke();
}

else
{
	$controllertocall=$_REQUEST['c'];
	$methodtoinvoke=$_REQUEST['m'];
	$querystring=$_SERVER['QUERY_STRING'];
	parse_str($querystring,$request_array);
	$argumentlist=[];
	$availablecontrollers=['LandingController','WriteController','ReadStoryController'];
	
	if(count($request_array)>2)
	{
		$numberofparams=count($request_array);
		for($i=1;$i<=($numberofparams-2);$i++)
		{
			$arname="arg".$i;
			if(array_key_exists($arname,$request_array))
			{
				$argumentlist[]=$request_array[$arname];
			}
		}
		
		//$controller->$methodtoinvoke($argumentlist);
	}
	if(in_array($controllertocall,$availablecontrollers))
	{
		//It is a valid controller
		$controllerclass=Config::_CONTROLLER_NAMESPACE_.$controllertocall;
		$controller=new $controllerclass();
		if(method_exists($controller,$methodtoinvoke))
		{
			//it is a valid method in the controller
			if(empty($argumentlist))
			{
				$controller->$methodtoinvoke();
			}
			else
			{
				$controller->$methodtoinvoke($argumentlist);
			}
		}
		else
		{
			print("Invalid method called. Page cannot be displayed");
		}
	}
	else
	{
		print("Page not found! Invalid Controller called");
	}
	
}
?>
