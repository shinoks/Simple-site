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
                switch($_GET['site']){
                    case 'shop':
                        $shop = new sites_shopController();
                        echo $shop->getShopSite();
                    break;
                    case 'myAccount':
                        $shop = new sites_shopController();
                        echo $shop->getMyAccountSite();
                    break;
                    default:
                        $shop = new sites_shopController();
                        echo $shop->getShopSite();
                }
                
            }else {
                echo $start->getLoginKonsultantSite();
            }
        }else {
            echo $start->getLoginKonsultantSite();
        }
}
