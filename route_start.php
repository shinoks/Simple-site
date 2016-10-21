<?php
switch($_GET['site']){
    case 'admin':
        $admin = new adminController();
        echo $admin->getAdminSite();
    break;
    case 'kontakt':
        $kontakt = new kontaktController();
        echo $kontakt->getkontaktSite();
    break;
    case 'shop':
        $shop = new sites_shopController();
        echo $shop->getShopSite();
    break;
    default:
        $start = new siteController();
        echo $start->getStartSite();
}