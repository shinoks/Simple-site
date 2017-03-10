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
    'User\\' => array($controllerClass.'/user'),
    'News\\' => array($controllerClass.'/news'),
    'Validate\\' => array($controllerClass.'/validate'),
    'Translate\\' => array($controllerClass.'/translate'),
     'WyszukiwarkaRegon\\Tests\\' => array($vendorDir . '/freshmindpl/wyszukiwarkaregon/src/tests'),
    'WyszukiwarkaRegon\\' => array($vendorDir . '/freshmindpl/wyszukiwarkaregon/src'),
    'Ups\\' => array($vendorDir . '/gabrielbull/ups-api/src'),
    'Psr\\Log\\' => array($vendorDir . '/psr/log/Psr/Log'),
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-message/src'),
    'GuzzleHttp\\Psr7\\' => array($vendorDir . '/guzzlehttp/psr7/src'),
    'GuzzleHttp\\Promise\\' => array($vendorDir . '/guzzlehttp/promises/src'),
    'GuzzleHttp\\' => array($vendorDir . '/guzzlehttp/guzzle/src'),
);
