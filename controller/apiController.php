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
            $this->loggedUser = user::getUserLoggedByUsername($_SESSION['user']);
            $logged = $this->loggedUser;
            if($logged['gid']=='25'||$_SERVER['REMOTE_ADDR']=='193.239.145.34'){
                switch($_GET['action']){
                    case 'seeAdmin':
                        header('Content-type: application/json');
                        echo json_encode(user::getAdmins());
                    break;
                    case 'checkUpsLastStatus':
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
                    case 'updateOrderStatus':
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
                    
                    default:
                        echo 'error';
                }
            }
        }else {
            echo 'brak logowania';
        }
    }
    
   
   

}