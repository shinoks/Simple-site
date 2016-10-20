<?php
    
require_once("../config/DbConn.php");

    use Config\Config;
    use Login\Login;
    use Menu\Menu;
    use Articles\Articles;
    use Shop\Shop;


    
class adminController
{
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
                array( "cache" => "./view/cache",
                )
            );
        $this->db = dbConn::getConnection();
        $this->config = config::getConfig();
        $this->adminMenu = menu::getAdminMenuItems();
        $this->adminMenuChild = menu::getAdminChildMenuItems();
        $this->menu = menu::getMenuItems();
        $this->menuChild = menu::getChildMenuItems();
    }
    
    public function getAdminSite()
    {
       $login = new Login($this->db);
       $sess = $login->checkSession();
       
        if($sess['session'] == true){
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
                    require_once("../config/DbConnGf.php");
                    $this->dbGf = dbConnGf::getConnection();
                    echo $this->getAdminShop();
                break;
                
                case 'contact':
                    echo $this->getAdminContact();
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
                return $this->twig->render("admin/start.html.twig", 
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
                   $login = $login->login($_POST['username'], $_POST['password']);
                    if($login == 1 || $sess == true){
                        return $this->twig->render("admin/start.html.twig", 
                            array(
                                'login'=>$login,
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config
                            )
                        );
                    } else {
                        $info = 'login-error';
                        return $this->twig->render("admin/login.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'info'=>$info,
                                'menuChild'=>$this->adminMenuChild,
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
                                (!empty($_POST['articleId']))?$articleId=$_POST['articleId']:$articleId=NULL;
                                
                                $saveMenu = menu::addUserMenu($menuName,$menuHref,$parentId,$parent,$published,$articleId); 
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
                            'userMenu'=>$this->menu,
                            'userMenuChild'=>$this->menuChild,
                            'menuParents'=>$menuParents
                        )
                    );
                break;
                
                case 'delete':
                
                    $del = menu::deleteUserMenu($_GET['id']);

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
        if(!isset($_GET['page'])){
            $activePage = 1;
        }else{
            $activePage = $_GET['page'];
        }
        $orderStatuses = shop::getOrderStatuses();
        
        switch($_GET['act']){
            case 'orderDetail':
                $order = shop::getOrderById($_GET['orderId']);
                
                if(isset($_GET['perf'])){
                    
                    switch($_GET['perf']){
                        case 'delete':
                            if(shop::deleteProductFromOrder($_GET['orderId'],$_GET['orderItemId'])){
                                $info = 'product-delete-success';
                            } else {
                                $info = 'product-delete-fail';
                            }
                        break;
                        case 'add':
                            if(shop::addProductToOrder($_GET['orderId'],$_POST['itemId'],$order['user_info_id'])){
                                $info = 'product-add-success';
                            } else {
                                $info = 'product-add-fail';
                            }
                        break;
                        case 'updateItem':
                            if(shop::updateOrderItem($_GET['orderId'], $_POST['itemId'], $_POST['productQuantity'], $_POST['productPrice'], $_POST['productFinalPrice'], time(), $_POST['productAttribute'])){
                                $info = 'product-updateItem-success';
                            } else {
                                $info = 'product-updateItem-fail';
                            }
                        break;
                        case 'updateOrderUser';
                            if(shop::updateOrderUser($_GET['orderId'], $_POST['userId'])){
                                $info = 'product-updateOrderUser-success';
                            } else {
                                $info = 'product-updateOrderUser-fail';
                            }
                        break;
                        case 'updateOrderSendTo';
                            if(shop::updateOrderSendTo($_GET['orderId'], $_POST['userInfoId'])){
                                $info = 'product-updateOrderSendTo-success';
                            } else {
                                $info = 'product-updateOrderSendTo-fail';
                            }
                        break;
                        case 'updateCustomerNote';
                            if(shop::updateCustomerNote($_GET['orderId'], $_POST['customerNote'])){
                                $info = 'product-updateOrderSendTo-success';
                            } else {
                                $info = 'product-updateOrderSendTo-fail';
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
                    $order = shop::getOrderById($_GET['orderId']);
                }
                
                $orderProducts = shop::getOrderProducts($_GET['orderId']);
                $userAddress = shop::getUserAddress($order['user_id']);
                $products = shop::getAllProducts();
                $users = shop::getAllUsers();
                $orderHistory = shop::getOrderHistory($_GET['orderId']);
                echo $info;
                
                return $this->twig->render("admin/shop-orderDetail.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'order'=>$order,
                                'info'=>$info,
                                'orderProducts'=>$orderProducts,
                                'products'=>$products,
                                'users'=>$users,
                                'userAddress'=>$userAddress,
                                'activePage'=>$activePage,
                                'orderStatuses'=>$orderStatuses,
                                'orderHistory'=>$orderHistory
                            )
                        );
            break;
            case 'users':
                
                if(isset($_GET['show'])){
                        switch($_GET['show']){
                            case 'userDetail':
                                if(isset($_GET['perf'])){
                                    switch($_GET['perf']){
                                        case 'updateUserInfo':
                                            if(shop::updateUserInfo($_GET['userId'],$_POST['company'],$_POST['firstName'] ,$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['phone2'],$_POST['address'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
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
                                            $_POST['phone1'],$_POST['phon2'],$_POST['address'],$_POST['address2'],$_POST['city'],$_POST['zip'],$_POST['extraField1'],$_POST['extraField2'])){
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
                                echo $info;
                                
                                return $this->twig->render("admin/shop-userDetail.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
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
                                echo $info;
                                return $this->twig->render("admin/shop-users.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
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
                                echo $info;
                                return $this->twig->render("admin/shop-users.html.twig", 
                                    array(
                                        'menu'=>$this->adminMenu,
                                        'menuChild'=>$this->adminMenuChild,
                                        'config'=>$this->config,
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
                                            'searchInput'=>$this->searchInput,
                                            'activePage'=>$activePage,
                                            'info'=>$info,
                                            'products'=>$products
                                        )
                                    );
                }
            break;
            
            case 'categories':
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
                                if(shop::addCategory($_POST['categoryName'],$_POST['categoryDescription'],$_POST['categoryThumbImage'],$_POST['categoryFullImage'],$_POST['categoryPublish'],$_POST['categoryName'],$_POST['cdate'],$_POST['listOrder'])){
                                    $info = 'addCategory-success';
                                } else {
                                    $info = 'addCategory-fail';
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
                                    'searchInput'=>$this->searchInput,
                                    'activePage'=>$activePage,
                                    'info'=>$info,
                                    'category'=>$category
                                )
                             );
                        break;
                        case 'categoryAdd':
                            $category = shop::getCategoryById($_GET['categoryId']);
                            return $this->twig->render("admin/shop-categoryAdd.html.twig", 
                                array(
                                    'menu'=>$this->adminMenu,
                                    'menuChild'=>$this->adminMenuChild,
                                    'config'=>$this->config,
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
                                            'searchInput'=>$this->searchInput,
                                            'activePage'=>$activePage,
                                            'info'=>$info,
                                            'categories'=>$categories
                                        )
                                    );
                }
            break;
            default:
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
                echo $info;
                return $this->twig->render("admin/shop.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'pagin'=>$pagin,
                                'searchInput'=>$this->searchInput,
                                'activePage'=>$activePage,
                                'orderStatuses'=>$orderStatuses,
                                'info'=>$info
                            )
                        );
        }
   }
   
   
}