<?php
namespace Translate;

class Translate {
    public function upsDescription($text){
        switch($text){
            case 'DELIVERED':
                $translated = 'Dostarczono';
            break;
            case 'OUT FOR DELIVERY':
                $translated = 'Do dostarczenia';
            break;
            case 'ARRIVAL SCAN':
                $translated = 'Skan przyjazdu';
            break;
            case 'DEPARTURE SCAN':
                $translated = 'Skan wyjazdu';
            break;
            case 'UNLOAD SCAN':
                $translated = 'Skan wyładunku';
            break;
            case 'BILLING INFORMATION RECEIVED':
                $translated = 'Otrzymano informację o przesyłce';
            break;
            case 'PICKUP SCAN':
                $translated = 'Przesyłka odebrana od nadawcy';
            break;
            case 'ORIGIN SCAN':
                $translated = 'Przesyłka zeskanowana';
            break;
            case 'DESTINATION SCAN':
                $translated = 'Skan w miejscu dostarczenia';
            break;
            case 'THE RECEIVER DOES NOT WANT THE PRODUCT AND REFUSED THE DELIVERY.':
                $translated = 'Odbiorca odmówił przesyłki';
            break;
            case 'THE RECEIVER STATES THE PRODUCT WAS NOT ORDERED AND HAS REFUSED THE DELIVERY. / THE PACKAGE WILL BE RETURNED TO THE SENDER.':
                $translated = 'Odbiorca odmówił przesyłki. Paczka zostanie zwrócona do nadawcy';
            break;
            case 'LOCATION SCAN':
                $translated = 'Wydane do doręczenia';
            break;
            default:
                $translated = $text;
        }
        
        return $translated;
    }
}
?>