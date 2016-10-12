<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
$controllerClass = "controller/class";

return array(
    'Config\\' => array('config'),
    'DbConn\\' => array('config'),
    'Shop\\' => array($controllerClass.'/shop'),
    'Cart\\' => array($controllerClass.'/cart'),
    'Login\\' => array($controllerClass.'/login'),
    'Menu\\' => array($controllerClass.'/menu'),
    'Articles\\' => array($controllerClass.'/articles'),
);
