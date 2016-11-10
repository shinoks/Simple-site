<?php
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");
                    
    use Cart\Cart;
    use Config\Config;
    use Menu\Menu;
    use Shop\Shop;
    use Login\Login;
    use User\User;
    use Validate\Validate;
    
class sites_shopController 
{
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
            array( "cache" => "./view/cache",
             'debug' => true,
            )
        );
        
        $this->db = dbConn::getConnection();
        $this->dbGf = dbConnGf::getConnection();
        $this->config = config::getConfig();
        $this->menu = menu::getMenuItems();
        $this->menuChild = menu::getChildMenuItems();
        $cart = new Cart();
    }
    
    
    public function getShopSite()
    {   $cart = new Cart();
    
        $products = shop::getAllProducts('Y');
        $categories = shop::getCategories('Y');
                
        $action = (isset($_GET['action'])) ? $_GET['action'] : '';
        $id = (isset($_GET['productId'])) ? $_GET['productId'] : 0;
        $qty = (isset($_GET['productId']) && isset($_GET['qty'])) ? $_GET['qty'] : 0;
        $user = NULL;
        
        switch($action) {
            case 'add':
                foreach($products as $product) {
                    if($product['product_id'] == $id) {
                        $cart->add($id,$qty);
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
                $info = "cart-empty";
            break;
            
            case 'update';
                $cart->update($id,$qty);
                $info = "cart-updated";
            break;
            
            case 'login':
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    $log = login::loginJoomla($_POST['username'],$_POST['password']);
                    ($log)?$info = 'login-success':$info='login-fail';
                }
            break;
            case 'logout':
                if(login::logout()){
                    $info = 'logout-success';
                } else {
                    $info = 'logout-fail';
                }
            break;
        }
        $sess = login::checkSession();
        if($sess['session']){
            $user = user::getUserLoggedByUsername($_SESSION['user']);
        }
        
        $items = $cart->getItems();
        
        if(isset($_GET['view'])){
            switch($_GET['view']){
                case 'account':
                    validate::checkShopLogged();
                    if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'updateUserInfo':
                                if(shop::updateUserInfo($user['id'],$_POST['company'],$_POST['firstName'] ,$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['phone2'],$_POST['address'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
                                    $info = 'updateUserInfo-success';
                                } else {
                                    $info = 'updateUserInfo-fail';
                                }
                            break;
                            case 'updateUserData':
                                if(shop::updateUserData($user['id'],$_POST['name'],$_POST['username'] ,$_POST['email'],$_POST['password'])){
                                    $info = 'updateUserData-success';
                                } else {
                                    $info = 'updateUserData-fail';
                                }
                            break;
                            case 'addUserInfo':
                                if(shop::addUserInfo($user['id'],$_POST['addressTypeName'],$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],
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
                    $userAddresses = shop::getUserAddress($user['id']);
                    $orders = shop::getUserOrders($user['id']);
                    $user = shop::getUserById($user['id']);
                    
                    return $this->twig->render("shop-account.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'userAddresses'=>$userAddresses,
                        'orders'=>$orders
                        )
                    );
                break;
                case 'orders';
                    validate::checkShopLogged();
                    $orders = shop::getUserOrders($user['id']);
                    return $this->twig->render("shop-orders.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'orders'=>$orders
                        )
                    );
                break;
                case 'orderDetail';
                    validate::checkShopLogged();
                    $orderProducts = shop::getOrderProductsFromUser($_GET['orderId'],$user['id']);
                    $order = shop::getOrderByIdFromUser($_GET['orderId'],$user['id']);
                    $userAddresses = shop::getUserAddress($user['id']);
                    $orderSendAddress = shop::getOrderUserInfo($_GET['orderId']);
                    
                    return $this->twig->render("shop-orderDetail.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'order'=>$order,
                        'orderProducts'=>$orderProducts,
                        'userAddresses'=>$userAddresses,
                        'orderSendAddress'=>$orderSendAddress
                        )
                    );
                break;
                case 'category';
                    $categoryProducts = shop::getProductFromCategory($_GET['categoryId'],'Y');
                    
                    return $this->twig->render("shop-category.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'categoryProducts'=>$categoryProducts
                        )
                    );
                break;
                case 'cart';
                    if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'addUserInfo':
                                if(shop::addUserInfo($user['id'],$_POST['addressTypeName'],$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],
                                    $_POST['phone1'],$_POST['phon2'],$_POST['address'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
                                    $info = 'addUserInfo-success';
                                } else {
                                    $info = 'addUserInfo-fail';
                                }
                            break;
                        }
                    }
                    $orderProducts = shop::getOrderProductsFromUser($_GET['orderId'],$user['id']);
                    $order = shop::getOrderByIdFromUser($_GET['orderId'],$user['id']);
                    $userAddresses = shop::getUserAddress($user['id']);
                    $paymentsMethod= shop::getPaymentsMethod();
                    
                    return $this->twig->render("shop-cartDetail.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'order'=>$order,
                        'orderProducts'=>$orderProducts,
                        'userAddresses'=>$userAddresses,
                        'paymentsMethod'=>$paymentsMethod
                        )
                    );
                break;
                case 'login';
                    
                    return $this->twig->render("shop-login.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user
                        )
                    );
                break;
                case 'register';
                    if(isset($_GET['perf'])){
                        switch($_GET['perf']){
                            case 'register':
                                if(isset($_POST['register'])){
                                    $error = validate::checkRegisterAction();
                                    if($error == true){
                                        $usAct = login::addNewJoomlaUser($_POST['name'],$_POST['username'],$_POST['name'],$_POST['password']);
                                        if($usAct>0){
                                            $usAd = shop::addUserInfo($usAct,"Adres faktury",$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],
                                            $_POST['phone1'],$_POST['phone2'],$_POST['address1'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'],'BT');
                                            if($usAd == true){
                                                $info = 'shop-addNewUser-success';
                                            } else {
                                                $info = 'shop-addNewUser-fail';
                                            }
                                        } else {
                                            $info = 'shop-addNewUser-fail';
                                        }
                                    } else {
                                        $info = 'shop-addNewUser-fail';
                                        $error;
                                    }
                                }
                            break;
                        }
                    }
                    
                    return $this->twig->render("shop-register.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'error'=>$error
                        )
                    );
                break;
                case 'doOrder';
                    validate::checkShopLogged();
                    $userAddresses = shop::getUserAddress($user['id']);
                    $paymentsMethod= shop::getPaymentsMethod();
                    
                    if(!empty($_POST['userInfoId'])&&!empty($_POST['paymentMethodId'])){
                        $total = 0;
                        $totalFinal = 0;
                        foreach($items as $id =>$qty){
                            foreach($products as $product){
                                if($product['product_id'] == $id){
                                    $total = $total + $product['product_price'] * $qty;
                                    (empty($product['final_price']))?$productFinalPrice=$product['product_price']:$productFinalPrice=$product['final_price'];
                                    $totalFinal = $totalFinal + $productFinalPrice * $qty;
                                }
                            }
                        }
                        
                       $orderTax = $totalFinal-$total;
                       $orderUserInfoId = time().'.'.bin2hex(openssl_random_pseudo_bytes(8));
                       $adord = shop::addOrder($user['id'],1,$orderUserInfoId,$_POST['userInfoId'],$totalFinal,$total,$orderTax,'',0,'PLN','P',0,0,0,'',$_POST['paymentMethodId'],$_POST['customerNote'],$_SERVER['REMOTE_ADDR']);
                        if( $adord > 0){
                            foreach($items as $id =>$qty){
                                foreach($products as $product){
                                    if($product['product_id'] == $id){
                                        (empty($product['final_price']))?$productFinalPrice = $product['product_price']:$productFinalPrice = $product['final_price'];
                                        shop::addProductToNewOrder($adord,$_POST['userInfoId'],1,$id,$product['product_sku'], $product['product_name'],$qty, $product['product_price'], $productFinalPrice);
                                    }
                                }
                            }
                            $addPayment = shop::addPaymentMethod($adord,$_POST['paymentMethodId']);
                            $userInfo = shop::getUserInfo($_POST['userInfoId']);
                            
                            $orderUserInfo = shop::addOrderUserInfo($adord,$user['id'],$userInfo['address_type'],$userInfo['address_type_name'],
                            $userInfo['company'],$userInfo['title'],$userInfo['last_name'],$userInfo['first_name'],$userInfo['middle_name'],$userInfo['phone_1'],
                            $userInfo['phone_2'],$userInfo['fax'],$userInfo['address_1'],$userInfo['address_2'],$userInfo['city'],$userInfo['state'],$userInfo['country'],
                            $userInfo['zip'],$userInfo['user_email'],$userInfo['extra_field_1'],$userInfo['extra_field_2'],$userInfo['extra_field_3'],$userInfo['extra_field_4'],
                            $userInfo['extra_field_5'],$userInfo['bank_account_nr'],$userInfo['bank_name'],$userInfo['bank_sort_code'],$userInfo['bank_iban'],
                            $userInfo['bank_account_holder'],$userInfo['bank_account_type']);
                            
                            if($userInfo['address_type']=="ST"){
                                $user = shop::getUserById($user['id']);
                                $userInfo = shop::getUserInfo($user['user_info_id']);
                                
                                $orderUserInfo = shop::addOrderUserInfo($adord,$user['id'],$userInfo['address_type'],$userInfo['address_type_name'],
                                    $userInfo['company'],$userInfo['title'],$userInfo['last_name'],$userInfo['first_name'],$userInfo['middle_name'],$userInfo['phone_1'],
                                    $userInfo['phone_2'],$userInfo['fax'],$userInfo['address_1'],$userInfo['address_2'],$userInfo['city'],$userInfo['state'],$userInfo['country'],
                                    $userInfo['zip'],$userInfo['user_email'],$userInfo['extra_field_1'],$userInfo['extra_field_2'],$userInfo['extra_field_3'],$userInfo['extra_field_4'],
                                    $userInfo['extra_field_5'],$userInfo['bank_account_nr'],$userInfo['bank_name'],$userInfo['bank_sort_code'],$userInfo['bank_iban'],
                                    $userInfo['bank_account_holder'],$userInfo['bank_account_type']);
                            }
                            
                            $info = "shop-doOrder-success-addOrder";
                            $cart->clear();
                            $items = $cart->getItems();
                        }else {
                            $info = "shop-doOrder-fail-addOrder";
                        }
                    } else {
                        $info = "shop-doOrder-fail-empty";
                    }
                    
                    
                    return $this->twig->render("shop-cartDetail.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'userAddresses'=>$userAddresses,
                        'paymentsMethod'=>$paymentsMethod
                        )
                    );
                break;
                default:
                    return $this->twig->render("shop.html.twig", array(
                        'szkId'=>$_GET['szkId'],
                        'menu'=>'start',
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user
                        )
                    );
            }
        }
        
        return $this->twig->render("shop.html.twig", array(
            'szkId'=>$_GET['szkId'],
            'menu'=>'start',
            'config'=>$this->config,
            'products'=>$products,
            'categories'=>$categories,
            'items'=>$items,
            'id'=>$id,
            'info'=>$info,
            'user'=>$user
            )
        );
    }
   
}