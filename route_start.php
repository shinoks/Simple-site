<?php
if(!isset($_GET['site'])){
    $start = new siteController();
    echo $start->getStartSite();
} elseif ($_GET['site']=='kontakt'){
    $kontakt = new kontaktController();
    echo $kontakt->getkontaktSite();
}  elseif ($_GET['site']=='admin'){
    $admin = new adminController();
    echo $admin->getAdminSite();
} else {
    $start = new siteController();
    echo $start->getStartSite();
}