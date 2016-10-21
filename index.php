<?php

require "vendor/autoload.php";
            
function classLoader($classname){
    $filename = 'controller/'.str_replace('_', DIRECTORY_SEPARATOR, $classname).'.php';
    $split =explode('_',$classname);
    $count = count($split);
    ($count==1)?$file=$split[0]:$file=$split[1];
    //$file = 'controller/'.$classname.'.php';
    if (file_exists($filename) && is_readable($filename) && !class_exists($file, false)){
        require_once($filename);
    }else{
        throw new Exception('Class cannot be found ( ' . $file . ' )');
    }
}
spl_autoload_register('classLoader');

session_start();
if(!isset($_SESSION['uzytkownik']))
{
    $_SESSION['uzytkownik'] = 0;
}

require_once "vendor/autoload.php";

require_once dirname(__FILE__).'/vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
    array( "cache" => false ) );

include_once ('route_start.php');