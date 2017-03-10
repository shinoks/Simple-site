<?php
    
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");
require_once("../config/DbConnInfo.php");

    use Config\Config;
    use Login\Login;
    use Menu\Menu;
    use Articles\Articles;
    use Shop\Shop;
    use User\User;
    use News\News;
    use Validate\Validate;
    use Translate\Translate;
    
class adminController
{
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
                array( "cache" => "./view/cache",
                )
            );
        $this->twig->addGlobal('session', $_SESSION);
        $this->db = dbConn::getConnection();
        $this->dbGf = dbConnGf::getConnection();
        $this->dbInfo = dbConnInfo::getConnection();
        $this->config = config::getConfig();
        $this->menuChild = menu::getChildMenuItems();
    }
    
    public function getAdminSite()
    {
       
        
        if(validate::checkAdminLogged()){
            $this->loggedUser = user::getUserLoggedByUsername($_SESSION['user']);
            $logged = $this->loggedUser;
            if($logged['gid']=='25'||$_SERVER['REMOTE_ADDR']=='193.239.145.34'){
                $this->adminMenu = menu::getAdminMenuItems($this->loggedUser['gid']);
                
                $this->adminMenuChild = menu::getAdminChildMenuItems($this->loggedUser['gid']);
                
                switch($_GET['action']){
                    
                    case 'configuration':
                        echo $this->getAdminConfiguration();
                    break;
                    
                    case 'menu':
                        echo $this->getAdminMenu();
                    break;
                    
                    case 'articles':
                        echo $this->getAdminArticles();
                    break;
                    
                    case 'shop':
                        echo $this->getAdminShop();
                    break;
                    
                    case 'contact':
                        echo $this->getAdminContact();
                    break;
                    
                    case 'konsultanci':
                        echo $this->getAdminKonsultanci();
                    break;
                    
                    case 'admins':
                        echo $this->getAdminAdmins();
                    break;
                    
                    case 'raports':
                        echo $this->getAdminRaports();
                    break;
                    
                    case 'tests':
                        echo $this->getAdminTests();
                    break;
                    
                    case 'agrements':
                        echo $this->getAdminAgrements();
                    break;
                    
                    case 'logout':
                        login::logout();
                        $info = 'logout';
                        return $this->twig->render("admin/login.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'info'=>$info,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config
                            )
                        );
                   break;
                   
                   default:
                        echo $this->getAdminStart();
                }
            }else {
                return $this->twig->render("admin/login.html.twig", 
                    array(
                        'menu'=>$this->adminMenu,
                        'menuChild'=>$this->adminMenuChild,
                        'config'=>$this->config
                    )
                );
            }
        }else {
           switch ($_GET['action']){
               case 'login':
                   $login = login::loginJoomlaAdministrator($_POST['username'],$_POST['password']);
                   $sess = login::checkSession();
                    if($login == true && $sess['session'] == true){
                        $this->loggedUser = user::getUserLoggedByUsername($_SESSION['user']);
                        $this->adminMenu = menu::getAdminMenuItems($this->loggedUser['gid']);
                        $this->adminMenuChild = menu::getAdminChildMenuItems($this->loggedUser['gid']);
                        
                        echo $this->getAdminStart($login);
                        
                    } else {
                        
                        $info = 'login-error';
                        return $this->twig->render("admin/login.html.twig", 
                            array(
                                'menu'=>$this->menu,
                                'info'=>$info,
                                'menuChild'=>$this->menuChild,
                                'config'=>$this->config
                            )
                        );
                    }
               break;
               
               case 'logout':
                    $login->logout();
                    $info = 'logout';
                    return $this->twig->render("admin/login.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'info'=>$info,
                            'menuChild'=>$this->adminMenuChild,
                            'config'=>$this->config
                        )
                    );
               break;
                
               default:
                return $this->twig->render("admin/login.html.twig", 
                    array(
                        'menu'=>$this->adminMenu,
                        'menuChild'=>$this->adminMenuChild,
                        'config'=>$this->config,
                        'info'=>$sess
                    )
                );
           }
        }
    }
    
    public function getAdminStart($login = NULL)
    {
        $news = News::getNews();
        
        return $this->twig->render("admin/start.html.twig", 
                 array(
                'login'=>$login,
                'menu'=>$this->adminMenu,
                'menuChild'=>$this->adminMenuChild,
                'config'=>$this->config,
                'news'=>$news
            )
            );
    }
    
    
   public function getAdminArticles()
   {   
        if(isset($_GET['act'])){
            switch($_GET['act']){
                case 'show':
                    if(articles::showArticle($_GET['id'])){
                        $info = 'article-show';
                    } else{
                        $info = 'article-show-fail';
                    }
                break;
                
                case 'hide':
                    if(articles::hideArticle($_GET['id'])){
                        $info = 'article-hide';
                    } else{
                        $info = 'article-hide-fail';
                    }
                break;
                
                case 'delete':
                    if(articles::deleteArticle($_GET['id'])){
                        $info = 'article-delete';
                    } else{
                        $info = 'article-delete-fail';
                    }
                break;
                
                case 'edit':
                
                    if($_POST['operation'] == 'save'){
                        $articleSave = articles::updateArticle($_POST['articleId'],$_POST['articleName'],$_POST['articleText'],$_POST['articleDate'],$_POST['articleAuthor'],$_POST['articlePulished'],$_POST['articleCategory']);
                        if($articleSave == 1){
                            $info = 'article-update';
                        }else{
                            $info = 'article-update-fail';
                        }
                    }
                    $article = articles::getArticle($_GET['id']);
                    
                    return $this->twig->render("admin/articles-edit.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'article'=>$article,
                                    'info'=>$info,
                                )
                    );
                break;
                
                case 'add':
                    if($_POST['operation'] == 'save'){
                        $articleSave = articles::addArticle($_POST['articleName'],$_POST['articleText'],$_POST['articleDate'],$_POST['articleAuthor'],$_POST['articlePulished'],$_POST['articleCategory']);
                        if($articleSave == 1){
                            $info = 'article-add';
                            $articles = articles::getArticles();
                            
                            return $this->twig->render("admin/articles.html.twig", 
                                        array(
                                            'menu'=>$this->adminMenu,
                                            'menuChild'=>$this->adminMenuChild,
                                            'config'=>$this->config,
                                            'articles'=>$articles,
                                            'info'=>$info,
                                        )
                            );
                        }else{
                            $info = 'article-update-fail';
                        }
                    } else {
                        $article = articles::getArticle($_GET['id']);
                        
                        return $this->twig->render("admin/articles-edit.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
                                        'article'=>$article,
                                        'info'=>$info,
                                        
                                    )
                        );
                    }
                break;
                            
            }
            if(!isset($_GET['page'])){
                $activePage = 1;
            }else{
                $activePage = $_GET['page'];
            }
            
            $pagin = articles::getPagination($activePage);
            
            return $this->twig->render("admin/articles.html.twig", 
                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'pagin'=>$pagin,
                                    'info'=>$info,
                                    'activePage'=>$activePage
                                )
                    );
            
        } else {
            if(!isset($_GET['page'])){
                $activePage = 1;
            }else{
                $activePage = $_GET['page'];
            }
            
            $pagin = articles::getPagination($activePage);
            
            return $this->twig->render("admin/articles.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'config'=>$this->config,
                            'pagin'=>$pagin,
                            'info'=>$info,
                            'activePage'=>$activePage
                        )
            );
        }

    }
   
   public function getAdminConfiguration()
   {
       if(isset($_GET['act'])){
           switch($_GET['act']){
               case 'save':
                $configSave = config::saveConfig();
                if($configSave==1){ $info = 'configuration-save'; $this->config = config::getConfig();}
                else {$info = 'configuration-fail';}
                
                return $this->twig->render("admin/configuration.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config
                        )
                    );
                    
               break;
               default:
                   return $this->twig->render("admin/configuration.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config
                        )
                    );
           }
            
           
       }else{
            return $this->twig->render("admin/configuration.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'config'=>$this->config
                )
            );
       }
   }
   
   public function getAdminContact()
   {
        return $this->twig->render("admin/contact.html.twig", 
            array(
                'menu'=>$this->adminMenu,
                'menuChild'=>$this->adminMenuChild,
                'info'=>$info,
                'config'=>$this->config
            )
        );
   }
   
   public function getAdminKonsultanci()
   {
       if(isset($_GET['perf'])){
           switch($_GET['perf']){
                case 'add':
                    if($_POST['adding']=='adding'){
                        (user::addKonsultant($_POST['firstName'], $_POST['lastName'], $_POST['password']))?$info = 'konsultant-add-success':$info = 'konsultant-add-fail';
                    }
                    return $this->twig->render("admin/konsultanci-add.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'delete':
                    if($this->loggedUser['gid']==25){
                        $del = user::deleteKonsultant($_GET['konsultantId']);
                        ($del == true)?$info='konsultanci-delete-success':$info='konsultanci-delete-fail';
                    }else {
                        $info='konsultanci-delete-fail-lackpermissions';
                    }
                    
                    $konsultanci = user::getKonsultanci();
                    
                    return $this->twig->render("admin/konsultanci.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultanci'=>$konsultanci,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'edit':
                    if(!empty($_POST['konsultantFirstName'])&&!empty($_POST['konsultantLastName'])&&!empty($_POST['konsultantId'])){
                        (user::updateKonsultant($_POST['konsultantFirstName'], $_POST['konsultantLastName'], $_POST['konsultantId']))?$info='konsultant-edit-success':$info='konsultant-edit-fail';
                    }
                    switch($_GET['act']){
                        case 'changePassword':
                            (user::updateKonsultantPassword($_GET['konsultantId'],$_POST['password']))?$info="konsultant-changePassword-success":$info="konsultant-changePassword-fail";
                        break;
                    }
                    
                    $konsultant = user::getKonsultantById($_GET['konsultantId']);
                    
                    return $this->twig->render("admin/konsultanci-edit.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultant'=>$konsultant,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'unpublish':
                    if(!empty($_GET['unpublish'])&&!empty($_GET['konsultantId'])){
                        (user::updateKonsultantBlock($_GET['konsultantId'],$_GET['unpublish']))?$info='konsultant-edit-success':$info='konsultant-edit-fail';
                    }
                    
                    $konsultanci = user::getKonsultanci();
                    
                    return $this->twig->render("admin/konsultanci.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultanci'=>$konsultanci,
                            'config'=>$this->config
                        )
                    );
                break;
                
                case 'hide':
                    if(!empty($_GET['konsultantId'])){
                        (user::updateKonsultantVisible($_GET['konsultantId'],0))?$info='konsultant-edit-success':$info='konsultant-visible-fail';
                    }else {
                        $info='konsultant-visible-fail';
                    }
                    
                    $konsultanci = user::getKonsultanci();
                    
                    return $this->twig->render("admin/konsultanci.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultanci'=>$konsultanci,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'show':
                    if(!empty($_GET['konsultantId'])){
                        (user::updateKonsultantVisible($_GET['konsultantId'],1))?$info='konsultant-visible-success':$info='konsultant-visible-fail';
                    }else {
                        $info='konsultant-visible-fail';
                    }
                    
                    $konsultanci = user::getKonsultanciAll();
                    
                    return $this->twig->render("admin/konsultanci-all.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultanci'=>$konsultanci,
                            'config'=>$this->config
                        )
                    );
                break;
                
                default :
                    $konsultanci = user::getKonsultanci();
                    return $this->twig->render("admin/konsultanci.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'konsultanci'=>$konsultanci,
                            'config'=>$this->config
                        )
                    );
            }
           
       }else {
           if(isset($_GET['view'])){
               switch($_GET['view']){
                   case 'all':
                        $konsultanci = user::getKonsultanciAll();
                        
                        return $this->twig->render("admin/konsultanci-all.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'info'=>$info,
                                'konsultanci'=>$konsultanci,
                                'config'=>$this->config
                            )
                        );
                   break;
                   default:
                       $konsultanci = user::getKonsultanci();
                    
                        return $this->twig->render("admin/konsultanci.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'info'=>$info,
                                'konsultanci'=>$konsultanci,
                                'config'=>$this->config
                            )
                        );
               }
           }else {
               $konsultanci = user::getKonsultanci();
               
                return $this->twig->render("admin/konsultanci.html.twig", 
                    array(
                        'menu'=>$this->adminMenu,
                        'menuChild'=>$this->adminMenuChild,
                        'info'=>$info,
                        'konsultanci'=>$konsultanci,
                        'config'=>$this->config
                    )
                );
            }
        }
   }
   
   public function getAdminAdmins()
   {     
        if(isset($_GET['perf'])){
            switch($_GET['perf']){
                case 'add':
                    if($_POST['adding']=='adding'){
                        (login::addNewJoomlaUser($_POST['adminName'],$_POST['adminUsername'],$_POST['adminEmail'],$_POST['password'],$usertype="Administrator",$block=0, $sendEmail=1, $gid=24, $activation="", $params = ""))?$info = 'admin-add-success':$info = 'admin-add-fail';
                    }
                    return $this->twig->render("admin/admins-add.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'delete':
                    if($this->loggedUser['gid']>=25){
                        $del = user::deleteAdmin($_GET['adminId']);
                        ($del == true)?$info='admin-delete-success':$info='admin-delete-fail';
                    }else {
                        $info='admin-delete-fail-lackpermissions';
                    }
                    
                    $admins = user::getAdmins();
               
                    return $this->twig->render("admin/admins.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'admins'=>$admins,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'edit':
                    if(!empty($_POST['adminName'])&&!empty($_POST['adminUsername'])&&!empty($_POST['adminId'])){
                        (user::updateKonsultant($_POST['konsultantFirstName'], $_POST['konsultantLastName'], $_POST['adminId']))?$info='admin-edit-success':$info='admin-edit-fail';
                    }
                    
                    $admin = user::getAdminById($_GET['adminId']);
               
                    return $this->twig->render("admin/admins.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'admin'=>$admin,
                            'config'=>$this->config
                        )
                    );
                break;
                case 'unpublish':
                    if($this->loggedUser['gid']>=25){
                        if(!empty($_GET['unpublish'])&&!empty($_GET['adminId'])){
                            (user::updateAdminBlock($_GET['adminId'],$_GET['unpublish']))?$info='admin-edit-success':$info='admin-edit-fail';
                        }
                    }else {
                        $info='admin-edit-fail';
                    }
                    
                    $admins = user::getAdmins();
               
                    return $this->twig->render("admin/admins.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'admins'=>$admins,
                            'config'=>$this->config
                        )
                    );
                break;
                
                default :
                    $admins = user::getAdmins();
               
                    return $this->twig->render("admin/admins.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'admins'=>$admins,
                            'config'=>$this->config
                        )
                    );
            }
       }else {
            $admins = user::getAdmins();
               
            return $this->twig->render("admin/admins.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'admins'=>$admins,
                    'config'=>$this->config
                )
            );
       }
   }
   
   public function getAdminRaports()
   {     
        $menu = 'raports';
        $time = time();
        $day = '1';
        (!empty($_GET['activeMonth']))?$month=$_GET['activeMonth']:$month = date('m',$time);
        (!empty($_GET['activeYear']))?$year=$_GET['activeYear']:$year = date('Y',$time);
        
        $dS = date('d-m-Y H:i:s',mktime(0, 0, 0, $month, $day, $year));
        $dE = date('t-m-Y H:i:s',mktime(23, 59, 59, $month, $day, $year));
        
        $dateStart = strtotime($dS);
        $dateEnd = strtotime($dE);
        $date = date('Y-m-d H:i:s', $dateStart);
        
        $dLS = date('d-m-Y H:i:s',mktime(0, 0, 0, $month-1, $day, $year));
        
        $dLE = date('t-m-Y H:i:s',mktime(23, 59, 59, $month-1, $day, $year));
        
        $dateLastMonthStart = strtotime($dLS);
        $dateLastMonthEnd = strtotime($dLE);
        $dates = ['dateStart'=>$dS,'dateStart'=>$dS,'dateLastMonthStart'=>$dLS,'dateLastMonthEnd'=>$dLE];
        
        if($_GET['view']=='konsultantRaport' && !empty($_GET['konsultantId'])){
            $ordersThisMonth = shop::getOrdersByKonsultantId($_GET['konsultantId'], $dateStart, $dateEnd);
            $ordersLastMonth = shop::getOrdersByKonsultantId($_GET['konsultantId'], $dateLastMonthStart, $dateLastMonthEnd);
            
            $ordersThisMonthSumSubtotal = array_sum(array_column($ordersThisMonth, 'order_subtotal')); 
            
            $ordersThisMonthSumTotal = array_sum(array_column($ordersThisMonth, 'order_total')); 
            $ordersThisMonthSumAdministrationFee = array_sum(array_column($ordersThisMonth, 'administrationFee')); 
            $ordersReceivedSumThisMonth = shop::getSumOrdersByKonsultantId($_GET['konsultantId'], $dateStart, $dateEnd, $status='Z');
            
            $ordersSendBack = shop::getSumOrdersByKonsultantId($konsultant['konsultantId'], $dateStart, $dateEnd, $status='R');
            $receivedSumWithoutAdministrationFee = round($ordersReceivedSumThisMonth['sum'] - $ordersThisMonthSumAdministrationFee);
            $premia = shop::getPremia($receivedSumWithoutAdministrationFee);
            $premiaBrak = shop::getPremiaBrak($receivedSumWithoutAdministrationFee);
            $addon = shop::getDodatkiByKonsultantId($year, $month,$_GET['konsultantId']);
            $ranking = shop::getRanking($_GET['konsultantId'], $dateStart, $dateEnd, $status='Z');
            $cash = (int)$premia+(int)$ranking;
                
            $ordersInfo = [
            'ordersThisMonth'=>$ordersThisMonth,
            'ordersThisMonthSumTotal'=>$ordersThisMonthSumTotal,
            'ordersThisMonthSumSubtotal'=>$ordersThisMonthSumSubtotal,
            'ordersReceivedSumThisMonth'=>$ordersReceivedSumThisMonth['sum'],
            'ordersThisMonthSumAdministrationFee'=>$ordersThisMonthSumAdministrationFee,
            'ordersSendBack'=>$ordersSendBack,
            'premia'=>$premia,
            'ranking'=>$ranking,
            'cash'=>$cash,
            'premiaBrak'=>$premiaBrak,
            'konsultantId'=>$_GET['konsultantId'],
            'addon'=>$addon
            ];
            
            return $this->twig->render("admin/raports-konsultant.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'admins'=>$admins,
                    'config'=>$this->config,
                    'ordersInfo'=>$ordersInfo,
                    'activeMonth'=>$month,
                    'activeYear'=>$year,
                    'dates'=>$dates
                )
            );
        } else {
            if(isset($_GET['perf'])){
                switch($_GET['perf']){
                    case 'updateAddon':
                        $addon = shop::updateAddon($_POST['year'], $_POST['month'], $_POST['konsultantId'], $_POST['addon']);
                        ($addon)?$info='shop-updateAddon-success':$info='shop-updateAddon-fail';
                    break;
                }
            }
            
            $konsultanci = user::getKonsultanciForRaports($date);
            
            $usersSum = [];
            foreach($konsultanci as $konsultant){
                
                $ordersThisMonth = shop::getOrdersByKonsultantId($konsultant['konsultantId'], $dateStart, $dateEnd);
                $received = [];
                $anulated = [];
                $sentBack = [];
                $sent = [];
                $warehouse = [];
                $paid = [];
                $debt = [];
                $paidAfter = [];
                $dividedOrder = 0;
                $paidDividedOrder = 0;
                
                foreach($ordersThisMonth as $order){
                    if($order['order_status_code']=='!'){
                        $received[] = $order;
                    }elseif($order['order_status_code']=='X'){
                        $anulated[] = $order;
                    }elseif($order['order_status_code']=='R'){
                        $sentBack[] = $order;
                    }elseif($order['order_status_code']=='S'){
                        $sent[] = $order;
                    }elseif($order['order_status_code']=='@'){
                        $warehouse[] = $order;
                    }elseif($order['order_status_code']=='Z'){
                        $paid[] = $order;
                        $paidDividedOrder += $order['sumDi'];
                    }elseif($order['order_status_code']=='W'){
                        $debt[] = $order;
                    }elseif($order['order_status_code']=='$'){
                        $paidAfter[] = $order;
                    }
                    if(isset($order['sumDi'])){
                        $dividedOrder += $order['sumDi'];
                    }
                }
                $countOrders = count($ordersThisMonth);
                $dividedOrdersSumAdd = shop::getDividedOrdersSumByKonsultant($konsultant['konsultantId'], $dateStart, $dateEnd);
                $ordersThisMonthSumSubtotal = array_sum(array_column($ordersThisMonth, 'order_subtotal')); 
                $ordersThisMonthSumTotal = array_sum(array_column($ordersThisMonth, 'order_total')); 
                $ordersSendBack =  array_sum(array_column($sentBack, 'order_subtotal'));
                $ordersReceivedSumThisMonth =  array_sum(array_column($received, 'order_subtotal')) + array_sum(array_column($paid, 'order_subtotal'));
                $ordersPayedSumThisMonth = array_sum(array_column($paid, 'order_subtotal'));
                
                $ordersThisMonthSumAdministrationFee = array_sum(array_column($ordersThisMonth, 'administrationFee')); 
                $ordersPayedSumThisMonthAdministrationFee = $ordersPayedSumThisMonth - $ordersThisMonthSumAdministrationFee - $paidDividedOrder + $dividedOrdersSumAdd;
                $premia = shop::getPremia($ordersPayedSumThisMonthAdministrationFee);
                $ranking =  array_sum(array_column($paid, 'ranking'));
                $cash = (int)$premia+(int)$ranking;
                $addon = shop::getDodatkiByKonsultantId($year, $month,$konsultant['konsultantId']);
                
                $usersSum[] = [
                'konsultantId'=>$konsultant['konsultantId'],
                'konsultantBlock'=>$konsultant['block'],
                'konsultantFirstName'=>$konsultant['konsultantFirstName'],
                'konsultantLastName'=>$konsultant['konsultantLastName'],
                'ordersThisMonthSumSubtotal'=>$ordersThisMonthSumSubtotal,
                'ordersThisMonthSumTotal'=>$ordersThisMonthSumTotal, 
                'ordersSendBack'=>$ordersSendBack, 
                'ordersReceivedSumThisMonth'=>$ordersReceivedSumThisMonth, 
                'ordersPayedSumThisMonthAdministrationFee'=>$ordersPayedSumThisMonthAdministrationFee, 
                'premia'=>$premia, 
                'ranking'=>$ranking, 
                'addon'=>$addon, 
                'countOrders'=>$countOrders, 
                'administrationFeeSum'=>array_sum(array_column($ordersThisMonth, 'administrationFee')),
                'dividedOrder'=>$dividedOrder,
                'paidDividedOrder'=>$paidDividedOrder,
                'dividedOrdersSumAdd'=>$dividedOrdersSumAdd
                ];
            }
                
            
            usort($usersSum, function($a, $b) {
                return  $b['ordersPayedSumThisMonthAdministrationFee'] - $a['ordersPayedSumThisMonthAdministrationFee'];
                });
                
            return $this->twig->render("admin/raports.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'admins'=>$admins,
                    'config'=>$this->config,
                    'usersSum'=>$usersSum,
                    'activeMonth'=>$month,
                    'activeYear'=>$year
                )
            );
        }
   }
   
   public function getAdminMenu()
   {
        if(isset($_GET['act'])){
            switch($_GET['act']){
                case 'add':
                    if(isset($_POST['operation'])){
                        switch($_POST['operation']){
                            case 'save':
                                $menuName = $_POST['menuName'];
                                $menuHref = 'index.php?site=articles&id='.$_POST['articleId'];
                                (!empty($_POST['parent']))?$parent=$_POST['parent']:$parent=0;
                                (!empty($_POST['parentId']))?$parentId=$_POST['parentId']:$parentId=0;
                                $published = $_POST['published'];
                                $permissions = $_POST['permissions'];
                                (!empty($_POST['articleId']))?$articleId=$_POST['articleId']:$articleId=NULL;
                                
                                $saveMenu = menu::addMenu($menuName,$menuHref,$parentId,$parent,$published,$articleId,$permissions); 
                                ($saveMenu == 1)?$info='addUserMenu-success':$info='addUserMenu-fail';
                            break;
                        }
                    }
                    $articles = articles::getArticles();
                    $menuParents = menu::getMenuItemsWithoutChild();

                    return $this->twig->render("admin/menu-add.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'articles'=>$articles,
                            'menuParents'=>$menuParents
                        )
                    );
                break;
                
                case 'delete':
                
                    $del = menu::deleteMenu($_GET['id']);

                    if($del == 1){
                        $info='deleteUserMenu-success';
                        $this->menuChild = menu::getChildMenuItems();
                        $this->menu = menu::getMenuItems();
                    } else{
                        $info='deleteUserMenu-fail' ;
                    }
                    
                    return $this->twig->render("admin/menu.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                        )
                    );
                break;
                
                case 'edit':
                    (isset($_POST['menuId']))?$menuId = $_POST['menuId']:$menuId = $_GET['id'];
                    
                    if($_POST['operation'] == 'save'){
                        $menuName = $_POST['menuName'];
                        $menuHref = 'index.php?site=articles&id='.$_POST['articleId'];
                        (!empty($_POST['parent']))?$parent=$_POST['parent']:$parent=0;
                        (!empty($_POST['parentId']))?$parentId=$_POST['parentId']:$parentId=0;
                        (!empty($_POST['articleId']))?$articleId=$_POST['articleId']:$articleId=NULL;
                        $published = $_POST['published'];
                        
                        $menuSave = menu::updateUserMenu($menuId,$menuName,$menuHref,$parentId,$parent,$published,$articleId);
                        
                        if($menuSave == 1){
                            $info = 'menu-update-success';
                        }else{
                            $info = 'menu-update-fail';
                        }
                        
                    }
                    
                    $articles = articles::getArticles();
                    $menuParents = menu::getMenuItemsWithoutChild();
                    $selectedMenu = menu::getMenuById($menuId);
                    
                    return $this->twig->render("admin/menu-edit.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'articles'=>$articles,
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                            'menuParents'=>$menuParents,
                            'selectedMenu'=>$selectedMenu
                        )
                    );
                break;
                
                default:
                    return $this->twig->render("admin/menu.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                        )
                    );
            }
        } else {
            return $this->twig->render("admin/menu.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'config'=>$this->config,
                    'userMenu'=>$this->menu,
                    'userMenuChild'=>$this->menuChild,
                )
            );
        }
   }
   
   public function getAdminShop()
   {        
        $info = '';
        if(isset($_GET['searchInput'])){
            $this->searchInput = $_GET['searchInput'];
        }
        if(isset($_GET['searchStatus'])){
            $this->searchStatus = $_GET['searchStatus'];
        }
        if(!isset($_GET['page'])){
            $activePage = 1;
        }else{
            $activePage = $_GET['page'];
        }
        $orderStatuses = shop::getOrderStatuses();
        
        switch($_GET['act']){
            case 'orderEdit':
                if(!empty($_POST['saveEdit'])){
                    $orderEdit = shop::updateOrderUserInfo($_POST['order_info_id'],$_POST['userId'],$_POST['company'],$_POST['firstName'] 
                    ,$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['phone2'],$_POST['address'],$_POST['city'],
                    $_POST['zip'],$_POST['extra_field_1'],$_POST['konsultant']);
                    
                    if($orderEdit){
                        $info='updateUserInfo-edit-success';
                        $order = shop::getOrderById($_GET['orderId']);
                        shop::addHistoryItem($order['order_id'],$order['order_status_code'],'Zmiana danych do faktury',$notified = 0, $this->loggedUser['id']);
                    }else {
                        $info='updateUserInfo-edit-fail';
                    }
                }
                $konsultanci = user::getKonsultanci();
                $order = shop::getOrderById($_GET['orderId']);
                
                return $this->twig->render("admin/shop-orderEdit.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'shopMenu'=>$shopMenu,
                                'order'=>$order,
                                'info'=>$info,
                                'konsultanci'=>$konsultanci
                            )
                        );
            break;
            case 'orderSendEdit':
                if(!empty($_POST['saveEdit'])){
                    $orderEdit = shop::updateOrderUserInfo($_POST['order_info_id'],$_POST['userId'],$_POST['company'],$_POST['firstName'] ,
                    $_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['phone2'],$_POST['address'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extra_field_2']);
                    if($orderEdit){
                        $info='updateUserInfo-edit-success';
                        $order = shop::getOrderUserSend($_GET['orderId']);
                        shop::addHistoryItem($order['order_id'],'-','Zmiana danych do wysyłki',$notified = 0, $this->loggedUser['id']);
                    }else {
                        $info='updateUserInfo-edit-fail';
                    }
                }
                
                $order = shop::getOrderUserSend($_GET['orderId']);
                
                return $this->twig->render("admin/shop-orderSendEdit.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'shopMenu'=>$shopMenu,
                                'order'=>$order,
                                'info'=>$info
                            )
                        );
            break;
            case 'orderDetail':
                $shopMenu='orderDetail';
                $order = shop::getOrderById($_GET['orderId']);
                
                if(isset($_GET['perf'])){
                    
                    switch($_GET['perf']){
                        case 'delete':
                            if(shop::deleteProductFromOrder($_GET['orderId'],$_GET['orderItemId'])){
                                $info = 'product-delete-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Usunięcie produktu: id-'.$_GET['orderItemId'],$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-delete-fail';
                            }
                        break;
                        case 'add':
                            if(shop::addProductToOrder($_GET['orderId'],$_POST['itemId'],$order['user_info_id'])){
                                $info = 'product-add-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Dodanie produktu: id-'.$_POST['itemId'],$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-add-fail';
                            }
                        break;
                        case 'updateItem':
                            if(shop::updateOrderItem($_GET['orderId'], $_POST['itemId'], $_POST['productQuantity'], $_POST['productPrice'], $_POST['productFinalPrice'], time(), $_POST['productAttribute'])){
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana w produkcie: id-'.$_POST['itemId'].' ilość-'.$_POST['productQuantity'].' cena netto-'. $_POST['productPrice'].' cena brutto-'.$_POST['productAttribute'] ,$notified = 0, $this->loggedUser['id']);
                                $info = 'product-updateItem-success';
                            } else {
                                $info = 'product-updateItem-fail';
                            }
                        break;
                        case 'updateOrderUser';
                            if(shop::updateOrderUser($_GET['orderId'], $_POST['userId'])){
                                $info = 'product-updateOrderUser-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana użytkownika',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-updateOrderUser-fail';
                            }
                        break;
                        case 'updateOrderSendTo';
                            if(shop::updateOrderSendTo($_GET['orderId'], $_POST['userInfoId'])){
                                $info = 'product-updateOrderSendTo-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana wysyłki',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-updateOrderSendTo-fail';
                            }
                        break;
                        case 'updateCustomerNote';
                            if(shop::updateCustomerNote($_GET['orderId'], $_POST['customerNote'])){
                                $info = 'product-updateCustomerNote-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana notatki',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-updateCustomerNote-fail';
                            }
                        break;
                        case 'updateLittleNote';
                            if(shop::updateLittleNote($_GET['orderId'], $_POST['littleNote'])){
                                $info = 'product-updateLittleNote-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana krótkiej notki',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'product-updateLittleNote-fail';
                            }
                        break;
                        case 'updateOrderStatus':
                            if(shop::updateOrderStatus($_GET['orderId'], $_POST['inputStatus'], $_POST['comments'])){
                                $info = 'updateOrderStatus-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana statusu zamówienia',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'updateOrderStatus-fail';
                            }
                        break;
                        case 'administrationFee':
                            if(shop::updateAdministrationFee($_GET['orderId'], $_POST['administrationFee'], $this->loggedUser['id'])){
                                $info = 'updateOrderStatus-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana kosztów administracyjnych',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'updateOrderStatus-fail';
                            }
                        break;
                        case 'paymentsMethod':
                            if(shop::updateOrderPaymentMethod($_GET['orderId'], $_POST['paymentMethodId'])){
                                $info = 'updateOrderPayment-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana metody płatności',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'updateOrderPayment-fail';
                            }
                        break;
                        case 'ranking':
                            if(shop::updateOrderRanking($_GET['orderId'], $_POST['ranking'])){
                                $info = 'updateOrderRanking-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zmiana rankingu zamówienia',$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'updateOrderRanking-fail';
                            }
                        break;
                        case 'divideOrder':
                            if(shop::addDivideOrder($_GET['orderId'], $_POST['konsultantId'], $_POST['sum'], $order['cdate'])){
                                $info = 'addDivideOrder-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zamówienie podzielone '.$_POST['sum'].' do '.$_POST['konsultantId'] ,$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'addDivideOrder-fail';
                            }
                        break;
                        case 'divideOrderDelete':
                            if(shop::deleteDivideOrder($_GET['orderId'], $_GET['konsultantId'])){
                                $info = 'deleteDivideOrder-success';
                                shop::addHistoryItem($_GET['orderId'],'-','Zamówienie podzielone do '.$_GET['konsultantId'].' usunięte' ,$notified = 0, $this->loggedUser['id']);
                            } else {
                                $info = 'deleteDivideOrder-fail';
                            }
                        break;
                        case 'addAgrementsHistory':
                            $date = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
                            if(shop::addAgrementsHistory($_GET['orderId'],$_POST['fvNumber'],$date, $_POST['subtotal'], $_POST['payed'], $_POST['all'])){
                                $info = 'addAgrementsHistory-success';
                            } else {
                                $info = 'addAgrementsHistory-fail';
                            }
                        break;
                        case 'updateAgrementsHistoryStatus':
                            if(shop::updateAgrementsHistoryStatus($_GET['agId'],$_GET['stat'])){
                                $info = 'updateAgrementsHistoryStatus-success';
                            } else {
                                $info = 'updateAgrementsHistoryStatus-fail';
                            }
                        break;
                        case 'updatePayedDate':
                            if(shop::updatePayedDate($_GET['orderId'],$_POST['month'],$_POST['year'],1)){
                                $info = 'updatePayedDate-success';
                            } else {
                                $info = 'updatePayedDate-fail';
                            }
                        break;
                    }
                    $order = shop::getOrderById($_GET['orderId']);
                }
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
                
                $orderProducts = shop::getOrderProducts($_GET['orderId']);
                $products = shop::getAllProducts();
                $users = shop::getAllUsers();
                $orderHistory = shop::getOrderHistory($_GET['orderId']);
                $orderAgrementsHistory = shop::getOrderAgrementHistory($_GET['orderId']);
                $userAddresses = shop::getUserAddress($order['user_id']);
                $orderSendAddress = shop::getOrderUserInfo($_GET['orderId']);
                $payments = shop::getPaymentsMethod();
                $konsultanci = user::getKonsultanci();
                $dividedOrders = shop::getDividedOrders($_GET['orderId']);
                $dividedSum = shop::getSumDividedOrders($_GET['orderId']);
                
                return $this->twig->render("admin/shop-orderDetail.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'shopMenu'=>$shopMenu,
                                'order'=>$order,
                                'info'=>$info,
                                'orderProducts'=>$orderProducts,
                                'products'=>$products,
                                'users'=>$users,
                                'userAddresses'=>$userAddresses,
                                'activePage'=>$activePage,
                                'orderStatuses'=>$orderStatuses,
                                'orderHistory'=>$orderHistory,
                                'orderAgrementsHistory'=>$orderAgrementsHistory,
                                'orderSendAddress'=>$orderSendAddress,
                                'payments'=>$payments,
                                'konsultanci'=>$konsultanci,
                                'ups'=>$ups,
                                'warning'=>$warning,
                                'upsAllActivity'=>$upsAllActivity,
                                'return'=>$return,
                                'dividedOrders'=>$dividedOrders,
                                'dividedSum'=>$dividedSum
                            )
                        );
            break;
            case 'orderPdf':
                $order = shop::getOrderById($_GET['orderId']);
                $products = shop::getAllProducts();
                $userAddresses = shop::getUserAddress($order['user_id']);
                $orderSendAddress = shop::getOrderUserInfo($_GET['orderId']);
                
                $orderProduct = shop::getOrderProductsFromUser($_GET['orderId'], $order['user_id']);
                
                $html = $this->twig->render("admin/shop-orderPDF.html.twig", 
                            array(
                                'order'=>$order,
                                'orderProducts'=>$orderProduct,
                                'products'=>$products,
                                'users'=>$users,
                                'userAddresses'=>$userAddresses,
                                'activePage'=>$activePage,
                                'orderStatuses'=>$orderStatuses,
                                'orderSendAddress'=>$orderSendAddress
                            )
                        );
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator('Grupa Format');
                $pdf->SetAuthor('Grupa Format');
                $pdf->SetTitle('Wydruk zamówienie: '.$_GET['orderId']);

                // set margins
                $pdf->SetMargins(10, 5, 20);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set default font subsetting mode
                $pdf->setFontSubsetting(true);

                // set font
                $pdf->SetFont('freeserif', '', 9);

                // add a page
                $pdf->AddPage();

                // write the text
                $pdf->writeHTML($html, true, false, true, false, '');

                //Close and output PDF document
                $pdf->Output('Wydruk zamówienie: '.$_GET['orderId'], 'I');
                
            break;
            case 'users':
                
                $shopMenu='users';
                 if(isset($_GET['perf'])){
                    switch($_GET['perf']){
                        case 'deleteUser':
                            $or = shop::getUserOrders($_GET['userId']);
                            if(count($or)==0){
                                if(shop::deleteUser($_GET['userId'])){
                                    $info = 'deleteUser-success';
                                } else {
                                    $info = 'deleteUser-fail';
                                }
                            }else {
                                $info = 'deleteUser-fail-haveOrders';
                            }
                        break;
                    }
                }
                
                if(isset($_GET['show'])){
                        switch($_GET['show']){
                            case 'userDetail':
                                if(isset($_GET['perf'])){
                                    switch($_GET['perf']){
                                        case 'updateUserInfo':
                                            if(shop::updateUserAddressInfo($_GET['userId'],$_POST['company'],$_POST['firstName'] ,$_POST['lastName'],
                                            $_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['address1'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
                                                $info = 'updateUserInfo-success';
                                            } else {
                                                $info = 'updateUserInfo-fail';
                                            }
                                        break;
                                        case 'updateUserData':
                                            if(shop::updateUserData($_GET['userId'],$_POST['name'],$_POST['username'] ,$_POST['email'],$_POST['password'])){
                                                $info = 'updateUserData-success';
                                            } else {
                                                $info = 'updateUserData-fail';
                                            }
                                        break;
                                        case 'addUserInfo':
                                        
                                            if(shop::addUserInfo($_GET['userId'],$_POST['addressTypeName'],$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],
                                            $_POST['phone1'],$_POST['phone2'],$_POST['address'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
                                                $info = 'addUserInfo-success';
                                            } else {
                                                $info = 'addUserInfo-fail';
                                            }
                                        break;
                                        case 'deleteUserInfo':
                                            if(shop::deleteUserInfo($_GET['userInfoId'])){
                                                $info = 'deleteUserInfo-success';
                                            } else {
                                                $info = 'deleteUserInfo-fail';
                                            }
                                        break;
                                    }
                                }
                                
                                $user = shop::getUserById($_GET['userId']);
                                $userAddresses = shop::getUserAddress($_GET['userId']);
                                $orders = shop::getUserOrders($_GET['userId']);
                                
                                return $this->twig->render("admin/shop-userDetail.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
                                        'shopMenu'=>$shopMenu,
                                        'searchInput'=>$this->searchInput,
                                        'activePage'=>$activePage,
                                        'user'=>$user,
                                        'userAddresses'=>$userAddresses,
                                        'info'=>$info,
                                        'orders'=>$orders
                                    )
                                );
                            break;
                            default:
                                $pagin = shop::getPaginationUsers($activePage);
                                
                                return $this->twig->render("admin/shop-users.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
                                        'shopMenu'=>$shopMenu,
                                        'pagin'=>$pagin,
                                        'searchInput'=>$this->searchInput,
                                        'activePage'=>$activePage,
                                        'users'=>$users,
                                        'info'=>$info
                                    )
                                );
                            
                        }
                } else {
                    $pagin = shop::getPaginationUsers($activePage);
                                
                                return $this->twig->render("admin/shop-users.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
                                        'shopMenu'=>$shopMenu,
                                        'pagin'=>$pagin,
                                        'searchInput'=>$this->searchInput,
                                        'activePage'=>$activePage,
                                        'users'=>$users,
                                        'info'=>$info
                                    )
                                );
                }
                
                
            break;
            case 'products':
                $shopMenu='products';
                $products = shop::getAllProducts();
                if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'deleteProduct':
                                if(shop::deleteProduct($_GET['productId'])){
                                    $info = 'deleteProduct-success';
                                } else {
                                    $info = 'deleteProduct-fail';
                                }
                            break;
                        }
                }
                if(isset($_GET['show'])){
                    switch($_GET['show']){
                        case 'productDetail':
                            $product = shop::getProductById($_GET['productId']);
                            
                            return $this->twig->render("admin/shop-productsDetails.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'product'=>$product
                                )
                             );
                        break;
                        default:
                            return $this->twig->render("admin/shop-products.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'products'=>$products
                                )
                             );
                    }
                }else {
                    return $this->twig->render("admin/shop-products.html.twig", 
                                        array(
                                            'menu'=>$this->adminMenu,
                                            'menuChild'=>$this->adminMenuChild,
                                            'config'=>$this->config,
                                            'shopMenu'=>$shopMenu,
                                            'searchInput'=>$this->searchInput,
                                            'activePage'=>$activePage,
                                            'info'=>$info,
                                            'products'=>$products
                                        )
                                    );
                }
            break;
            case 'raports':
                $shopMenu='raports';
                $time = time();
                (!empty($_GET['activeDay']))?$day=$_GET['activeDay']:$day = date('d',$time);
                (!empty($_GET['activeMonth']))?$month=$_GET['activeMonth']:$month = date('m',$time);
                (!empty($_GET['activeYear']))?$year=$_GET['activeYear']:$year = date('Y',$time);
                
                switch($_GET['pref']){
                    case 'daily':
                    
                        $start_date = mktime(0,0,0,$month,$day,$year);
                        $end_date = mktime(23,59,59,$month,$day,$year);
                        $start_date_month = mktime(0,0,0,$month,1,$year);
                        $end_date_month = mktime(0,0,0,$month+1,1,$year);
                        
                        $daySum = shop::getSumOrdersByDates($start_date,$end_date);
                        $dayCount = shop::getCountOrdersByDates($start_date,$end_date);
                        $monthSum = shop::getSumOrdersByDates($start_date_month,$end_date_month);
                        if($daySum['sum'] == 0 || $dayCount['count'] == 0){$dayAverage = 0;}else {$dayAverage = $daySum['sum']/$dayCount['count'];}
                        
                        // TYLKO DLA PODZIAŁÓW W ODDZIALE NA BHP I OCHRONA
                        if($this->config['klasy']==1){
                            
                            $dayPayedSumOther = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date,$end_date,'Z',0);
                            $dayPayedSumBhp = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date,$end_date,'Z',1);
                            $monthPayedSumOther = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date_month,$end_date_month,'Z',0);
                            $monthPayedSumBhp = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date_month,$end_date_month,'Z',1);
                            
                            $dayReceivedSumOther = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date,$end_date,'!',0);
                            $dayReceivedSumBhp = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date,$end_date,'!',1);
                            $monthReceivedSumOther = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date_month,$end_date_month,'!',0);
                            $monthReceivedSumBhp = shop::getSumOrdersByDatesAndStatusAndKlasa($start_date_month,$end_date_month,'!',1);
                           
                            $raports = [
                            'daySum'=>$daySum['sum'],
                            'dayCount'=>$dayCount['count'],
                            'dayAverage'=>$dayAverage, 
                            'monthSum'=>$monthSum['sum'],
                            'dayPayedSumOther'=>$dayPayedSumOther,
                            'dayPayedSumBhp'=>$dayPayedSumBhp,
                            'monthPayedSumOther'=>$monthPayedSumOther,
                            'monthPayedSumBhp'=>$monthPayedSumBhp,
                            'dayReceivedSumOther'=>$dayReceivedSumOther,
                            'dayReceivedSumBhp'=>$dayReceivedSumBhp,
                            'monthReceivedSumBhp'=>$monthReceivedSumBhp,
                            'monthReceivedSumOther'=>$monthReceivedSumOther
                            ];
                            
                        }else {
                            $raports = ['daySum'=>$daySum['sum'],'dayCount'=>$dayCount['count'],'dayAverage'=>$dayAverage, 'monthSum'=>$monthSum['sum']];
                        }
                        
                        return $this->twig->render("admin/shop-raports.html.twig", 
                                                array(
                                                    'menu'=>$this->adminMenu,
                                                    'menuChild'=>$this->adminMenuChild,
                                                    'config'=>$this->config,
                                                    'shopMenu'=>$shopMenu,
                                                    'searchInput'=>$this->searchInput,
                                                    'activePage'=>$activePage,
                                                    'info'=>$info,
                                                    'raports'=>$raports,
                                                    'activeDay'=>$day,
                                                    'activeMonth'=>$month,
                                                    'activeYear'=>$year
                                                )
                                            );
                    break;
                    case 'products':
                        $start_date_month = mktime(0,0,0,$month,1,$year);
                        $end_date_month = mktime(0,0,0,$month+1,1,$year);
                        
                        $productsCount = shop::getCountProductsByDates($start_date_month,$end_date_month);
                        $productSum = array_sum(array_column($productsCount, 'count')); 
                        $raports = ['productsCount'=>$productsCount,'productSum'=>$productSum];
                        
                        return $this->twig->render("admin/shop-raports-products.html.twig", 
                                                array(
                                                    'menu'=>$this->adminMenu,
                                                    'menuChild'=>$this->adminMenuChild,
                                                    'config'=>$this->config,
                                                    'shopMenu'=>$shopMenu,
                                                    'searchInput'=>$this->searchInput,
                                                    'activePage'=>$activePage,
                                                    'info'=>$info,
                                                    'raports'=>$raports,
                                                    'activeDay'=>$day,
                                                    'activeMonth'=>$month,
                                                    'activeYear'=>$year
                                                )
                                            );
                    break;
                    default:
                    
                        $start_date = mktime(0,0,0,$month,$day,$year);
                        $end_date = mktime(23,59,59,$month,$day,$year);
                        $start_date_month = mktime(0,0,0,$month,1,$year);
                        $end_date_month = mktime(0,0,0,$month+1,1,$year);
                        
                        $daySum = shop::getSumOrdersByDates($start_date,$end_date);
                        $dayCount = shop::getCountOrdersByDates($start_date,$end_date);
                        $monthSum = shop::getSumOrdersByDates($start_date_month,$end_date_month);
                        
                        if($daySum['sum'] == 0 || $dayCount['count'] == 0){$dayAverage = 0;}else {$dayAverage = $daySum['sum']/$dayCount['count'];}
                        
                        $raports = ['daySum'=>$daySum['sum'],'dayCount'=>$dayCount['count'],'dayAverage'=>$dayAverage, 'monthSum'=>$monthSum['sum']];
                        
                        return $this->twig->render("admin/shop-raports.html.twig", 
                                                array(
                                                    'menu'=>$this->adminMenu,
                                                    'menuChild'=>$this->adminMenuChild,
                                                    'config'=>$this->config,
                                                    'shopMenu'=>$shopMenu,
                                                    'searchInput'=>$this->searchInput,
                                                    'activePage'=>$activePage,
                                                    'info'=>$info,
                                                    'raports'=>$raports,
                                                    'activeDay'=>$day,
                                                    'activeMonth'=>$month,
                                                    'activeYear'=>$year
                                                )
                                            );
                }
            break;
            
            case 'categories':
                $shopMenu='categories';
                $categories = shop::getCategories();
                if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'deleteCategory':
                                if(shop::deleteCategory($_GET['categoryId'])){
                                    $info = 'deleteCategory-success';
                                } else {
                                    $info = 'deleteCategory-fail';
                                }
                            break;
                            case 'addCategory':
                                if(shop::addCategory($_POST['categoryName'],$_POST['categoryDescription'],$_POST['categoryThumbImage'],$_POST['categoryFullImage'],$_POST['categoryPublish'],$_POST['cdate'],$_POST['listOrder'])){
                                    $info = 'addCategory-success';
                                } else {
                                    $info = 'addCategory-fail';
                                }
                            break;
                            case 'updateCategory':
                                if(shop::updateCategory($_GET['categoryId'],$_POST['categoryName'],$_POST['categoryDescription'],$_POST['categoryThumbImage'],$_POST['categoryFullImage'],$_POST['categoryPublish'],$_POST['cdate'],$_POST['listOrder'])){
                                    $info = 'updateCategory-success';
                                    $category = shop::getCategoryById($_GET['categoryId']);
                                } else {
                                    $info = 'updateCategory-fail';
                                }
                            break;
                        }
                }
                if(isset($_GET['show'])){
                    switch($_GET['show']){
                        case 'categoryDetail':
                            $category = shop::getCategoryById($_GET['categoryId']);
                            return $this->twig->render("admin/shop-categoryDetails.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'category'=>$category
                                )
                             );
                        break;
                        case 'categoryAdd':
                            return $this->twig->render("admin/shop-categoryAdd.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info
                                )
                             );
                        break;
                        case 'categoryEdit':
                            $category = shop::getCategoryById($_GET['categoryId']);
                            return $this->twig->render("admin/shop-categoryEdit.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'category'=>$category
                                )
                             );
                        break;
                        default:
                            return $this->twig->render("admin/shop-categories.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
                                    'shopMenu'=>$shopMenu,
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'categories'=>$categories
                                )
                             );
                    }
                }else {
                    return $this->twig->render("admin/shop-categories.html.twig", 
                                        array(
                                            'menu'=>$this->adminMenu,
                                            'menuChild'=>$this->adminMenuChild,
                                            'config'=>$this->config,
                                            'shopMenu'=>$shopMenu,
                                            'searchInput'=>$this->searchInput,
                                            'activePage'=>$activePage,
                                            'info'=>$info,
                                            'categories'=>$categories
                                        )
                                    );
                }
            break;
            default:
                
                $shopMenu='orders';
                if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'deleteOrder':
                                if(shop::deleteOrder($_GET['orderId'])){
                                    $info = 'deleteOrder-success';
                                } else {
                                    $info = 'deleteOrder-fail';
                                }
                            break;
                            case 'updateOrderStatus':
                                if(shop::updateOrderStatus($_GET['orderId'], $_POST['inputStatus'], $_POST['comments'])){
                                    $info = 'updateOrderStatus-success';
                                } else {
                                    $info = 'updateOrderStatus-fail';
                                }
                            break;
                        }
                }
                
                $pagin = shop::getPagination($activePage);
                
                return $this->twig->render("admin/shop.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'shopMenu'=>$shopMenu,
                                'pagin'=>$pagin,
                                'searchInput'=>$this->searchInput,
                                'searchStatus'=>$this->searchStatus,
                                'activePage'=>$activePage,
                                'orderStatuses'=>$orderStatuses,
                                'info'=>$info,
                                'orderStatuses'=>$orderStatuses
                            )
                        );
        }
   }
   
   public function getAdminTests()
   {
            return $this->twig->render("admin/tests.html.twig", 
                array(
                    'menu'=>$this->adminMenu,
                    'menuChild'=>$this->adminMenuChild,
                    'info'=>$info,
                    'config'=>$this->config,
                    'userMenu'=>$this->menu,
                    'userMenuChild'=>$this->menuChild,
                )
            );
        
   }
   
   public function getAdminAgrements()
   {    
        if(isset($_GET['act'])){
            switch($_GET['act']){
                case 'faktury':
                    $agrements = shop::getAgrementsHistoryOrder();
                    
                    return $this->twig->render("admin/agrements-faktury.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                            'agrements'=>$agrements
                            )
                    );
                break;
                default:
                    $agrements = shop::getAgrementsHistoryOrder();
                    $agrementsOrder = shop::getAgrementsOrders();
                   
                    return $this->twig->render("admin/agrements.html.twig", 
                        array(
                            'menu'=>$this->adminMenu,
                            'menuChild'=>$this->adminMenuChild,
                            'info'=>$info,
                            'config'=>$this->config,
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                            'agrements'=>$agrements,
                            'agrementsOrder'=>$agrementsOrder
                            )
                    );
            }
        }else {
           $agrements = shop::getAgrementsHistoryOrder();
           $agrementsOrder = shop::getAgrementsOrders();
                return $this->twig->render("admin/agrements.html.twig", 
                    array(
                        'menu'=>$this->adminMenu,
                        'menuChild'=>$this->adminMenuChild,
                        'info'=>$info,
                        'config'=>$this->config,
                        'userMenu'=>$this->menu,
                        'userMenuChild'=>$this->menuChild,
                        'agrements'=>$agrements,
                        'agrementsOrder'=>$agrementsOrder
                    )
                );
        }
   }
   
   

}