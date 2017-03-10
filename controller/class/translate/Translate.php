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
            case 'THE RECEIVER DOES NOT WANT THE PRODUCT AND REFUSED THE DELIVERY. / WE\'VE CONTACTED THE SENDER.':
                $translated = 'Odbiorca odmówił przesyłki - kontakt z nadawcą';
            break;
            case 'THE RECEIVER HAS MOVED. WE\'RE ATTEMPTING TO OBTAIN A NEW DELIVERY ADDRESS FOR THIS RECEIVER.':
                $translated = 'Odbiorca przeprowadził się - Próba kontaktu z odbiorcą w celu ustalenia adresu';
            break;
            case 'THE DELIVERY CHANGE WAS COMPLETED. / DELIVERY WILL BE RESCHEDULED.':
                $translated = 'Zmiana adresu została skompletowana - dostarczenie przesunięte';
            break;
            case 'A DELIVERY CHANGE FOR THIS PACKAGE IS IN PROGRESS. / WE\'VE RESCHEDULED THIS DELIVERY.':
                $translated = 'Zmiana adresu dla paczki jest w toku - dostarczenie przesunięte';
            break;
            case 'THE RECEIVER HAS MOVED. WE\'RE ATTEMPTING TO OBTAIN A NEW DELIVERY ADDRESS FOR THIS RECEIVER. / WE\'VE CONTACTED THE RECEIVER TO REQUEST ADDITIONAL INFORMATION.':
                $translated = 'Odbiorca się przeprowadził. Próbujemy zdobyć nowy adres wysyłki dla tej przesyłki. Skontaktowaliśmy się z odbiorcą po dodatkowe informacje.e';
            break;
            case 'THE DELIVERY CHANGE WAS COMPLETED. / THE PACKAGE IS BEING HELD FOR A FUTURE DELIVERY DATE.':
                $translated = 'Zmiana adresu została skompletowana - paczka zatrzymana do późniejszego dostarczenia';
            break;
            default:
                $translated = $text;
        }
        
        return $translated;
    }
}
?>