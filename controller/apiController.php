<?php
    
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");

    use Config\Config;
    use Login\Login;
    use Menu\Menu;
    use Articles\Articles;
    use Shop\Shop;
    use User\User;
    use Validate\Validate;
    use Translate\Translate;
    
class apiController
{
    
    function __construct()
    {
        $this->db = dbConn::getConnection();
        $this->dbGf = dbConnGf::getConnection();
        $this->config = config::getConfig();
    }
    
    public function getApi()
    {
        if(validate::checkAdminLogged()){
            //DLA ZALOGOWANYCH
            $this->loggedUser = user::getUserLoggedByUsername($_SESSION['user']);
            $logged = $this->loggedUser;
            if($logged['gid']=='25'||$_SERVER['REMOTE_ADDR']='193.239.145.34'){
                switch($_GET['action']){
                    case 'seeAdmin':// Pokaż Adminów
                        header('Content-type: application/json');
                        echo json_encode(user::getAdmins());
                    break;
                    case 'checkUpsLastStatus'://Sprawdzenie statusu UPS
                        header('Content-type: application/json');
                        $conf = $this->config;
                        $accessKey = $conf['upsAccessKey'];
                        $userId=$conf['upsUserId'];
                        $password=$conf['upsPassword'];
                        
                        $tracking = new Ups\Tracking($accessKey, $userId, $password);
                        $beginDate = new \DateTime(date('Y-m-d',time()-63072000));
                        $endDate = new \DateTime(date('Y-m-d',time()));

                        $tracking->setShipperNumber($conf['upsAccount']);
                        $tracking->setBeginDate($beginDate);
                        $tracking->setEndDate($endDate);
                        
                        $ups=[];
                        try {
                            $shipment = $tracking->trackByReference($_GET['orderId']);
                            $activity = $shipment->Package->Activity;
                            if(count($activity)>1){
                                $date = date_create($activity[0]->Date.' '.$activity[0]->Time);
                                $description = translate::upsDescription($activity[0]->Status->StatusType->Description);
                                
                                $ups = ['city'=>$activity[0]->ActivityLocation->Address->City,
                                            'zip'=>$activity[0]->ActivityLocation->Address->PostalCode,
                                            'code'=>$activity[0]->ActivityLocation->Code,
                                            'descriptionPlace'=>$activity[0]->ActivityLocation->Description,
                                            'signedForByName'=>$activity[0]->ActivityLocation->SignedForByName,
                                            'description'=>$description,
                                            'date'=>date_format($date, 'Y-m-d H:i:s')
                                ];
                            }
                            $i = 0;
                            $upsAllActivity=[];
                            
                            foreach($shipment->Package->Activity as $activity) {
                                $date = date_create($activity->Date.' '.$activity->Time);
                                $description = translate::upsDescription($activity->Status->StatusType->Description);
                                ($description == 'Odbiorca odmówił przesyłki. Paczka zostanie zwrócona do nadawcy')?$return = '1':'';
                                
                                $upsAllActivity[] = ['city'=>$activity->ActivityLocation->Address->City,
                                            'zip'=>$activity->ActivityLocation->Address->PostalCode,
                                            'code'=>$activity->ActivityLocation->Code,
                                            'descriptionPlace'=>$activity->ActivityLocation->Description,
                                            'signedForByName'=>$activity->ActivityLocation->SignedForByName,
                                            'description'=>$description,
                                            'date'=>date_format($date, 'Y-m-d H:i:s')
                                ];
                                $i++;
                            }
                        } catch (Exception $e) {
                            $warning= $e;
                        }
                        echo json_encode($upsAllActivity);
                        
                    break;
                    case 'updateOrderStatus'://Zmiana statusu zamówienia
                        if(isset($_GET['orderId'])&&isset($_GET['orderStatusCode'])){
                            try{
                                (shop::updateOrderStatus($_GET['orderId'], $_GET['orderStatusCode']))?$update = 1:$update = 0;
                                echo $update;
                                
                            }catch (Exception $e){
                                $warning = $e;
                            }
                        }else {
                            echo 'error';
                        }
                    break;
                    
                    case 'newEvents':
                        $events = shop::getNewEvents(5,$_SESSION['user']);
                        
                        echo $events[0][0].';'.$events[0][1].';'.$events[0][4];
                    break;
                    
                    case 'newEventsVisited':
                        $visited = shop::updateNewEvents($_GET['eventId'],$_SESSION['user']);
                        echo $visited;
                        
                    break;
                    
                    case 'download':
                        if(isset($_GET['file'])){
                            $ref = $_SERVER['HTTP_REFERER'];
                            $ref = explode('.',$ref);
                            if($ref[1]=='grupaformat' || $ref[2]=='grupaformat'){
                            switch($_GET['file']){
                                case 'FDHISOH3958ddsfsdfs':
                                   $plik = 'http://www.sklepzory.grupaformat.pl/web/pliki/baza-firm-all-09032017.zip';
                                    
                                break;
                            }
                                header('Content-Description: File Transfer');
                                header('Content-Type: application/octet-stream');
                                header('Content-Disposition: attachment; filename="'.basename($plik).'"');
                                header('Expires: 0');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');
                                header('Content-Length: ' . filesize($plik));
                                readfile($plik);
                                exit;
                            
                            
                             }else {
                                 echo 'błąd autoryzacji - file';
                             }
                        }else {
                            echo 'error-file';
                        }
                    break;
                    
                    default:
                        echo 'error';
                }
            }
        }else {
            //DLA NIZALOGOWANYCH
            if(isset($_POST['username'])&&$_POST['password']){
                if($_POST['username']=='cron' && $_POST['password']=='UJf837$ksd94*$@)46643456f'){
                    switch($_POST['action']){
                        case 'sendFakturaRemainder'://WYSYŁANIE MAILA GDY MIJA 1 MIESIĄC
                            $agrementsOrder = shop::getAgrementsOrdersToRemainder();
                            $agrementsOrder2 = $agrementsOrder;
                            foreach($agrementsOrder as $agrement){
                                if($agrement['countFaktury']>0 && $agrement['countFaktury']<12 && $agrement['calosc']==0){
                                    $agrementHistory = shop::getAgrementsHistoryOrderByOrderId($agrement['order_id']);
                                    $fakturaDate = new DateTime($agrementHistory[0]['agDate']);
                                    $nowTime = new DateTime(NOW);
                                    $diff = $fakturaDate->diff($nowTime);
                                    $miesiac = $diff->m;
                                    $day = $diff->d;
                                    $config = $this->config;
                                    
                                    $html = '<body>
                                        <h1>Umowa BHP</h1>
                                        Nowa faktura do wystawienia:<br/>
                                        zam. nr: '.$agrement['order_id'].'<br/>
                                        <table>
                                            <tr>
                                                <td>Kwota</td>
                                                <td>Nr faktury</td>
                                                <td>Zapłacone</td>
                                                <td>Data faktury</td>
                                            </tr>
                                            ';
                                    foreach ($agrementsOrder2 as $ag){
                                        $html .= '  <tr>
                                                        <td>'.$ag['agSubtotal'].'</td>
                                                        <td>'.$ag['agFvNumber'].'</td>
                                                        <td>'.$ag['agPayed'].'</td>
                                                        <td>'.$ag['agDate'].'</td>
                                                    </tr>
                                        ';
                                    }
                                    
                                    $html .='
                                        </table>
                                        </body>';
                                        
                                    $temat = $config['pageName'].' - faktura do zam nr. '.$agrement['order_id'];
                                    
                                    if($miesiac == 1 && $day == 0){
                                        $mail = new PHPMailer;
                                        $mail->IsSMTP();
                                        $mail->Host = "www.grupaformat.pl";
                                        $mail->setFrom($config['email']);
                                        $mail->addAddress($config['siteEmail']);
                                        $mail->addAddress('pawel@grupaformat.pl');
                                        $mail->addReplyTo($config['siteEmail'], $config['pageName']);
                                        
                                        $mail->isHTML(true);
                                        $mail->Subject = $temat;
                                        
                                        $mail->Body = $html;
                                        if(!$mail->send()) {
                                            echo 0;
                                            echo $day.'<br/>';
                                            echo $miesiac;
                                        } else {
                                            echo 1;
                                        }
                                    }
                                }
                            }
                        break;
                        case 'download':
                            if(isset($_GET['file'])){
                                switch($_GET['file']){
                                    case 'FDHISOH3958ddsfsdfs':
                                       var_dump($_SERVER);
                                        
                                    break;
                                }
                                 
                            }else {
                                echo 'error-file';
                            }
                        break;
                    }
                    
                    
                }else {
                    echo 'brak logowania';
                }
            }else {
                echo 'bdddrak logowania';
            }
        }
    }
    
   
   

}