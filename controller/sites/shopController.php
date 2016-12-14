<?php
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");
//require_once("../vendor/phpmailer/class.phpmailer.php");
                    
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
        $this->twig->addGlobal('session', $_SESSION);
        
        $this->db = dbConn::getConnection();
        $this->dbGf = dbConnGf::getConnection();
        $this->config = config::getConfig();
        $this->menu = menu::getMenuItems();
        $this->menuChild = menu::getChildMenuItems();
        $cart = new Cart();
    }
    
    
    public function getShopSite()
    {   $cart = new Cart();
        $menu = 'shop';
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
            case 'logoutKonsultant':
                (user::logoutKonsultant())?$info='logoutKonsultant-success':$info='logoutKonsultant-fail';
                    $config = $this->config;
                    header('Location: http://'.$config['pageSite'].'/index.php?info=logout-success');
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
                            case 'updateUserInfoId':
                                if(shop::updateUserInfoId($user['id'],$_POST['company'],$_POST['firstName'] ,$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['phone2'],$_POST['address'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'],$_POST['orderUserInfo'])){
                                    $info = 'updateSendInfo-success';
                                } else {
                                    $info = 'updateSendInfo-fail';
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
                                if(shop::addUserInfo($user['id'],$_POST['addressTypeName'],$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],$_POST['phone1'],$_POST['phone2'],$_POST['address'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_SESSION['kN'],'ST',$_POST['email'])){
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
                    $userAddresses = shop::getUserSendAddress($user['id']);
                    $orders = shop::getUserOrders($user['id']);
                    $user = shop::getUserById($user['id']);
                    
                    return $this->twig->render("shop-account.html.twig", array(
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                                    $_POST['phone1'],$_POST['phone2'],$_POST['address'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_SESSION['kN'],$_POST['email'])){
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                                        $usAct = login::addNewJoomlaUser($_POST['name'],$_POST['username'],$_POST['email'],$_POST['password']);
                                        if($usAct>0){
                                            $usAd = shop::addUserInfo($usAct,"Adres faktury",$_POST['company'] ,$_POST['lastName'],$_POST['firstName'],
                                            $_POST['phone1'],$_POST['phone2'],$_POST['address1'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_SESSION['kN'],'BT',$_POST['email']);
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
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'menu'=>$menu,
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
                    
                    if(!empty($_POST['userInfoId'])&&!empty($_POST['paymentMethodId']) && !empty($products)){
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
                        $konsultant = $_SESSION['kN'];
                        
                        if($totalFinal <> 0){
                            $adord = shop::addOrder($user['id'],1,$orderUserInfoId,$_POST['userInfoId'],$totalFinal,$total,$orderTax,'',0,'PLN','P',0,0,0,'',$_POST['paymentMethodId'],$_POST['customerNote'],$_SERVER['REMOTE_ADDR'],$konsultant);
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
                                $orderUserInfo = shop::addOrderUserInfo($adord,$user['id'],'BT',$userInfo['address_type_name'],
                                $userInfo['company'],$userInfo['title'],$userInfo['last_name'],$userInfo['first_name'],$userInfo['middle_name'],$userInfo['phone_1'],
                                $userInfo['phone_2'],$userInfo['fax'],$userInfo['address_1'],$userInfo['address_2'],$userInfo['city'],$userInfo['state'],$userInfo['country'],
                                $userInfo['zip'],$userInfo['user_email'],$userInfo['extra_field_1'],$konsultant,$userInfo['extra_field_3'],$userInfo['extra_field_4'],
                                $userInfo['extra_field_5'],$userInfo['bank_account_nr'],$userInfo['bank_name'],$userInfo['bank_sort_code'],$userInfo['bank_iban'],
                                $userInfo['bank_account_holder'],$userInfo['bank_account_type']);
                                
                                if($userInfo['address_type']=="ST"){
                                    $user = shop::getUserById($user['id']);
                                    $userInfo = shop::getUserInfo($user['user_info_id']);
                                    
                                    $orderUserInfo = shop::addOrderUserInfo($adord,$user['id'],'ST',$userInfo['address_type_name'],
                                        $userInfo['company'],$userInfo['title'],$userInfo['last_name'],$userInfo['first_name'],$userInfo['middle_name'],$userInfo['phone_1'],
                                        $userInfo['phone_2'],$userInfo['fax'],$userInfo['address_1'],$userInfo['address_2'],$userInfo['city'],$userInfo['state'],$userInfo['country'],
                                        $userInfo['zip'],$userInfo['user_email'],$userInfo['extra_field_1'],$konsultant,$userInfo['extra_field_3'],$userInfo['extra_field_4'],
                                        $userInfo['extra_field_5'],$userInfo['bank_account_nr'],$userInfo['bank_name'],$userInfo['bank_sort_code'],$userInfo['bank_iban'],
                                        $userInfo['bank_account_holder'],$userInfo['bank_account_type']);
                                }
                                
                                $info = "shop-doOrder-success-addOrder";
                                $cart->clear();
                                
                                
                                $orderProducts = shop::getOrderProductsFromUser($adord,$user['id']);
                                $order = shop::getOrderByIdFromUser($adord,$user['id']);
                                $orderSendAddress = shop::getOrderUserInfo($adord);
                                $config=$this->config;
                                
                                if(count($orderSendAddress)>1){
                                    $addType = 'ST';
                                } else {
                                    $addType = 'BT';
                                }
                                $a = 0;
                                foreach($orderSendAddress as $sendAddres){
                                     if ($sendAddres['address_type'] == $addType){
                                         $address = $sendAddres;
                                     }
                                }
                                
                                $productsHtml = '';
                                foreach($orderProducts as $products)
                                {
                                    $finalPrice = round($products['product_quantity']*$products['product_final_price'],2);
                                    $productsPrice = round($products['product_quantity']*$products['product_item_price'],2);
                                    $productsHtml .= '<tr>';
                                        $productsHtml .= '<td>'.round($products['product_quantity'],2).'</td>';
                                        $productsHtml .= '<td>'.$products['order_item_name'].'</td>';
                                        $productsHtml .= '<td>'.$products['order_item_sku'].'</td>';
                                        $productsHtml .= '<td>'.round($products['product_item_price'],2).'/'.round($products['product_final_price'],2).'</td>';
                                        $productsHtml .= '<td>'.$productsPrice.'/'.$finalPrice.'</td>';
                                        $productsHtml .= '<td>'.$finalPrice.'</td>';
                                    $productsHtml .= '</tr>';
                                }
                                
                                $mail = new PHPMailer;
                                
                                $mail->setFrom($config['email']);
                                $mail->addAddress($user['email']);     // Add a recipient
                                $mail->addReplyTo($config['siteEmail'], $config['pageName']);
                                $mail->addBCC($config['siteEmail']);
                                
                                $mail->isHTML(true);                                  // Set email format to HTML
                                
                                $mail->Subject = $config['pageName'].' zamówienie nr. '.$adord;
                                $mail->Body    = '
                                <style type="text/css">
                                    body{
                                        font-family:Calibri;
                                        background:#efefef;
                                    }
                                    .bo{
                                        background:#fff;
                                        padding:20px;
                                        border-radius:5px;
                                        width: 940px;
                                    }
                                    table.sample {
                                        width:900px;
                                        border-width: 0px;
                                        border-spacing: 0px;
                                        border-style: none;
                                        border-collapse: separate;
                                    }
                                    table.sample th {
                                        border-width: 0px;
                                        padding: 1px;
                                        border-style: inset;
                                        -moz-border-radius: ;
                                    }
                                    table.sample td {
                                        border-width: 0px;
                                        padding: 5px;
                                        border-style: inset;
                                        -moz-border-radius: ;
                                    }
                                </style>
                                <body>
                                    <div class="bo">
                                    <h1>Zamówienie nr. '.$adord.'</h1>
                                <table class="sample" style="">
                                    <tr style="background:#c1c1c1">
                                        <td style="width:200px;">Informacja o zamówieniu</td>
                                        <td style="text-align:left;"></td>
                                        <td style="width:200px;"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Numer zamówienia</td>
                                        <td>'.$adord.'</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Data zamówienia</td>
                                        <td>'.date('d-m-Y H:i:s', time()).'</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="background:#c1c1c1">
                                        <td>Dane klienta</td>
                                        <td></td>
                                        <td>Dane wysyłki</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td style="text-align:left;">'.$order['email'].'</td>
                                        <td>Alias adresu:</td>
                                        <td style="text-align:left;width:200px;">'.$address['address_type_name'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Nazwa firmy:</td>
                                        <td style="text-align:left;">'.$order['company'].'</td>
                                        <td>Nazwa firmy:</td>
                                        <td style="text-align:left;">'.$address['company'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Imię i nazwisko:</td>
                                        <td style="text-align:left;">'.$order['first_name'].$order['last_name'].'</td>
                                        <td>Imię i nazwisko:</td>
                                        <td style="text-align:left;">'.$address['first_name'].$address['last_name'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Ulica:</td>
                                        <td style="text-align:left;">'.$order['address_1'].'</td>
                                        <td>Ulica:</td>
                                        <td style="text-align:left;">'.$address['address_1'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Miasto:</td>
                                        <td style="text-align:left;">'.$order['city'].'</td>
                                        <td>Miasto:</td>
                                        <td style="text-align:left;">'.$address['city'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Kod pocztowy:</td>
                                        <td style="text-align:left;">'.$order['zip'].'</td>
                                        <td>Kod pocztowy:</td>
                                        <td style="text-align:left;">'.$address['zip'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Telefon:</td>
                                        <td style="text-align:left;">'.$order['phone_1'].'</td>
                                        <td>Telefon:</td>
                                        <td style="text-align:left;">'.$address['phone_1'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Telefon kom.:</td>
                                        <td style="text-align:left;">'.$order['phone_2'].'</td>
                                        <td>Telefon kom.:</td>
                                        <td style="text-align:left;">'.$address['phone_2'].'</td>
                                    </tr>
                                    <tr>
                                        <td>NIP:</td>
                                        <td style="text-align:left;">'.$order['extra_field_1'].'</td>
                                        <td>NIP:</td>
                                        <td style="text-align:left;">'.$address['extra_field_1'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Konsultant:</td>
                                        <td style="text-align:left;">'.$_SESSION['kN'].' - '.$_SESSION['fN'].' '.$_SESSION['lN'].' </td>
                                        <td></td>
                                        <td style="text-align:left;"></td>
                                    </tr>
                                    </table>
                                    
                                    <br/>
                                    <table class="sample" style="width:100%; cell-padding:0; cell-spacing:0;">
                                    <tr style="background:#c1c1c1">
                                        <td colspan="6"><b>Szczegóły zamówienia</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Ilość</b></td>
                                        <td><b>Nazwa</b></td>
                                        <td><b>Symbol</b></td>
                                        <td><b>Cena</b></td>
                                        <td><b>Suma netto</b></td>
                                        <td><b>Suma brutto</b></td>
                                    </tr>
                                    <tr>
                                        '.$productsHtml.'
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Suma netto:</b></td>
                                        <td>'.round($order['order_total'],2).'</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Suma brutto:</b></td>
                                        <td>'.round($order['order_subtotal'],2).'</td>
                                    </tr>
                                    </table>
                                    <br/>
                                    <table class="sample" style="width:100%; cell-padding:0; cell-spacing:0;">
                                    <tr style="background:#c1c1c1">
                                        <td colspan="6"><b>Notatka klienta</b></td>
                                    </tr>
                                    <tr>
                                        <td>'.$order['customer_note'].'</td>
                                    </tr>
                                    </table>
                                    <br/>
                                    <table class="sample" style="width:100%; cell-padding:0; cell-spacing:0;">
                                    <tr style="background:#c1c1c1">
                                        <td colspan="6"><b>Informacje o płatności</b></td>
                                    </tr>
                                    <tr>
                                        <td>'.$order['payment_method_name'].'</td>
                                    </tr>
                                </table>
                                    <br/><br/><br/>
                                    <center><a href="'.$config['pageSite'].'">'.$config['pageSite'].'</a></center>
                                    </bo></body>';
                                
                                if(!$mail->send()) {
                                    echo 'Message could not be sent.';
                                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                                } else {
                                    echo 'Message has been sent';
                                }
                                
                                
                                $items = $cart->getItems();
                            }else {
                                $info = "shop-doOrder-fail-addOrder";
                            }
                        } else {
                            $info = "shop-doOrder-fail-empty";
                        }
                    }else {
                        $info = "shop-doOrder-fail-empty";
                    }
                    
                    
                    return $this->twig->render("shop-cartDetail.html.twig", array(
                        'menu'=>$menu,
                        'config'=>$this->config,
                        'products'=>$products,
                        'categories'=>$categories,
                        'items'=>$items,
                        'id'=>$id,
                        'info'=>$info,
                        'user'=>$user,
                        'userAddresses'=>$userAddresses,
                        'paymentsMethod'=>$paymentsMethod,
                        'orderProduct'=>$orderProduct,
                        'order'=>$order,
                        'orderSendAddress'=>$orderSendAddress
                        )
                    );
                break;
                default:
                    return $this->twig->render("shop.html.twig", array(
                        'menu'=>$menu,
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
            'menu'=>$menu,
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
    
    public function getMyAccountSite()
    {
        $menu = 'myAccount';
        $time = time();
        $day = '1';
        $month = date('m',$time);
        $year = date('Y');
        
        $dS = date('d-m-Y H:i:s',mktime(0, 0, 0, $month, $day, $year));
        $dE = date('t-m-Y H:i:s',mktime(0, 0, 0, $month, $day, $year));
        $dateStart = strtotime($dS);
        $dateEnd = strtotime($dE);
        $dLS = date('d-m-Y H:i:s',mktime(0, 0, 0, $month-1, $day, $year));
        $dLE = date('t-m-Y H:i:s',mktime(0, 0, 0, $month-1, $day, $year));
        $dateLastMonthStart = strtotime($dLS);
        $dateLastMonthEnd = strtotime($dLE);
        
        $dates = ['dateStart'=>$dS,'dateStart'=>$dS,'dateLastMonthStart'=>$dLS,'dateLastMonthEnd'=>$dLE];
        $ordersThisMonth = shop::getOrdersByKonsultantId($_SESSION['kN'], $dateStart, $dateEnd);
        $ordersLastMonth = shop::getOrdersByKonsultantId($_SESSION['kN'], $dateLastMonthStart, $dateLastMonthEnd);
        
        $ordersThisMonthSumSubtotal = array_sum(array_column($ordersThisMonth, 'order_subtotal')); 
        $ordersThisMonthSumTotal = array_sum(array_column($ordersThisMonth, 'order_total')); 
        $ordersThisMonthSumAdministrationFee = array_sum(array_column($ordersThisMonth, 'administrationFee')); 
        $ordersLastMonthSumSubtotal = array_sum(array_column($ordersLastMonth, 'order_subtotal')); 
        $ordersLastMonthSumTotal = array_sum(array_column($ordersLastMonth, 'order_total')); 
        $ordersLastMonthSumAdministrationFee = array_sum(array_column($ordersLastMonth, 'administrationFee')); 
        $ordersReceivedSumThisMonth = shop::getSumOrdersByKonsultantId($_SESSION['kN'], $dateStart, $dateEnd, $status='Z');
        
        
        $ordersReceivedSumLastMonth = shop::getSumOrdersByKonsultantId($_SESSION['kN'], $dateLastMonthStart, $dateLastMonthEnd, $status='Z');
        var_dump($ordersReceivedSumThisMonth);
        $receivedSumWithoutAdministrationFee = round($ordersReceivedSumThisMonth['sum'] - $ordersThisMonthSumAdministrationFee);
        $premia = shop::getPremia($receivedSumWithoutAdministrationFee);
        $premiaBrak = shop::getPremiaBrak($receivedSumWithoutAdministrationFee);
        
        $ordersInfo = [
        'ordersThisMonth'=>$ordersThisMonth,
        'ordersThisMonthSumTotal'=>$ordersThisMonthSumTotal,
        'ordersThisMonthSumSubtotal'=>$ordersThisMonthSumSubtotal,
        'ordersLastMonth'=>$ordersLastMonth,
        'ordersLastMonthSumSubtotal'=>$ordersLastMonthSumSubtotal,
        'ordersLastMonthSumTotal'=>$ordersLastMonthTubtotal,
        'ordersReceivedSumThisMonth'=>$ordersReceivedSumThisMonth['sum'],
        'ordersReceivedSumLastMonth'=>$ordersReceivedSumLastMonth['sum'],
        'ordersThisMonthSumAdministrationFee'=>$ordersThisMonthSumAdministrationFee,
        'ordersLastMonthSumAdministrationFee'=>$ordersLastMonthSumAdministrationFee,
        'premia'=>$premia,
        'premiaBrak'=>$premiaBrak
        ];
        
        return $this->twig->render("myAccount.html.twig", array(
            'menu'=>$menu,
            'config'=>$this->config,
            'info'=>$info,
            'user'=>$user,
            'ordersInfo'=>$ordersInfo,
            'dates'=>$dates
            )
        );
    }
    
   
}