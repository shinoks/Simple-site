<?php
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");
    
    use Cart\Cart;
    use User\User;
    use Config\Config;
    use Menu\Menu;
    use Articles\Articles;
    use Shop\Shop;
    
class siteController 
{
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
            array( "cache" => "./view/cache",
             'debug' => true,
            )
            );
        $this->twig->addGlobal('session', $_SESSION);
        
        $this->db = dbConn::getConnection();
        $this->dbGf = dbConnGf::getConnection();
        $this->config = config::getConfig();
        $this->menu = menu::getMenuItems();
        $this->menuChild = menu::getChildMenuItems();
    }
    
    
    public function getStartSite()
    {
        if(isset($_GET['site'])){
            switch($_GET['site']){
                case 'myAccount':
                    
                break;
                
                default:
                
                    return $this->twig->render("start.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info
                        )
                    );
            }
        }
        
        
        $cart = new Cart();
                
        $products = array(
            array('id'=>8001, 'name'=>'Apple iPhone', 'price'=>'699.00'),
            array('id'=>8012, 'name'=>'Samsung Galaxy', 'price'=>'599.00'),
            array('id'=>8018, 'name'=>'Nokia Lumia', 'price'=>'499.00'),
        );
        
        $action = (isset($_GET['action'])) ? $_GET['action'] : '';
        $id = (isset($_GET['id'])) ? $_GET['id'] : 0;
        $qty = (isset($_GET['id']) && isset($_GET['qty'])) ? $_GET['qty'] : 0;

        switch($action) {
            case 'add':
                foreach($products as $product) {
                    if($product['id'] == $id) {
                        $cart->add($id);
                        break;
                    }
                }
                $info = "cart-add";
            break;

            case 'remove':
                $cart->remove($id);
                $info = "cart-removed";
            break;

            case 'empty':
                $cart->clear();
                $ino = "cart-empty";
            break;
            
            case 'update';
                $cart->update($id,$qty);
                $info = "cart-updated";
        }

        $items = $cart->getItems();

        
        return $this->twig->render("start.html.twig", array(
            'szkId'=>$_GET['szkId'],
            'menu'=>'start',
            'config'=>$this->config,
            'products'=>$products,
            'items'=>$items,
            'id'=>$id,
            'info'=>$info
        )
            );
    }
    
    public function getLoginKonsultantSite()
    {
        
        switch($_GET['action']) {
            case 'loginKonsultant':
                if(!empty($_POST['konsultantFirstName'])||!empty($_POST['konsultantLastName'])||!empty($_POST['konsultantPassword'])||!empty($_POST['konsultantNumber'])){
                    
                    $firstName = $_POST['konsultantFirstName'];
                    $lastName = $_POST['konsultantLastName'];
                    $password = $_POST['konsultantPassword'];
                    $number = $_POST['konsultantNumber'];
                    $config = $this->config;
                    
                    if($_SERVER['REMOTE_ADDR']=='193.239.145.34'){
                        if(user::getKonsultant($firstName,$lastName,$password,$number)){
                            user::setKonsultantSession($firstName, $lastName, $number);
                            header('Location: http://'.$config['pageSite'].'/index.php?info=loginKonsultant-success');
                        }else {
                            $info = 'loginKonsultant-fail';
                            header('Location: http://'.$config['pageSite'].'/index.php?info=loginKonsultant-fail');
                        }
                    } else {
                        $info = 'loginKonsultant-ipfail';
                    }
                }else {
                    $info = 'loginKonsultant-lackField';
                }
            break;
            case 'logoutKonsultant':
                (user::logoutKonsultant())?$info='logoutKonsultant-success':$info='logoutKonsultant-fail';
            break;
        }
        (empty($info))?$info = $_GET['info']:'';
        return $this->twig->render("loginKonsultant.html.twig", array(
            'config'=>$this->config,
            'info'=>$info
        )
            );
    }
    public function checkKonsultant()
    {
        if(user::getKonsultantLog()==1){
            return true;
        } else {
            return false;
        }
    }
   
}