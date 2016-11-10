<?php
namespace Validate;
use Login\Login;

class Validate {
    public function checkRegisterAction()
    {
        (!empty($_POST['name']))?'':$info.='Nazwa';
        (!empty($_POST['username']))?'':$info.='Login;';
        (!empty($_POST['password']))?'':$info.='Hasło;';
        (!empty($_POST['company']))?'':$info.='Nazwa firmy;';
        (!empty($_POST['firstName']))?'':$info.='Imię;';
        (!empty($_POST['lastName']))?'':$info.='Nazwisko;';
        (!empty($_POST['phone1']))?'':$info.='Telefon;';
        (!empty($_POST['address1']))?'':$info.='Adres;';
        (!empty($_POST['city']))?'':$info.='Miasto;';
        (!empty($_POST['zip']))?'':$info.='Kod pocztowy;';
        (!empty($_POST['extraField1']))?'':$info.='NIP;';
        if($info == ''){
            return true;
        }else {
            return $info;
        }
    }
    
    public function checkShopLogged()
    {
        $ses = login::checkSession();
        if($ses['session']==true){
            return true;
        }else {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php?site=shop&view=login';
            header("Location: http://".$host.$uri."/".$extra);
            exit;
        }
    }
}
?>