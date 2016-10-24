<?php

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
        require $file;
    }
});

use cool_name_for_your_group\hw3\controllers\LandingController;
use cool_name_for_your_group\hw3\controllers\WriteController;

//require_once('LandingController.php');
//require_once('WriteController.php');
if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
    $controller=new LandingController();
    $controller->invoke();
}

else
{
    $controllertocall=$_REQUEST['c'];
    switch ($controllertocall) {
        case 'WriteController' :
            $controller=new WriteController();
            break;
        default:
            $controller= new LandingController();
    }
    $methodtoinvoke=$_REQUEST['m'];
    $controller->$methodtoinvoke();
    
}
?>

