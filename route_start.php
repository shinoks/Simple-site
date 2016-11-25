<?php

switch($_GET['site']){
    case 'admin':
        $admin = new adminController();
        echo $admin->getAdminSite();
    break;

    default:
    
        $start = new siteController();
        if(!empty($_SESSION['fN'])&&!empty($_SESSION['lN'])&&!empty($_SESSION['hP'])&&!empty($_SESSION['kN'])){
            if($start->checkKonsultant()){
                $shop = new sites_shopController();
                echo $shop->getShopSite();
            }else {
                echo $start->getLoginKonsultantSite();
            }
        }else {
            echo $start->getLoginKonsultantSite();
        }
        var_dump($_SESSION);
}
