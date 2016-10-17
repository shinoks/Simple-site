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

        if($sess == true){
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
        
        switch($_GET['act']){
            case 'orderDetail':
                $order = shop::getOrderById($_GET['orderId']);
                $orderProducts = shop::getOrderProducts($_GET['orderId']);
                $products = shop::getAllProducts();
                $users = shop::getAllUsers();
                $userAddress = shop::getUserAddress($order['user_id']);
                
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
                        
                    }
                    $orderProducts = shop::getOrderProducts($_GET['orderId']);
                    $order = shop::getOrderById($_GET['orderId']);
                }
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
                            )
                        );
            break;
            
            default:
                $start = (int) 0;
                $end = (int) 100;
                if(!isset($_GET['page'])){
                    $activePage = 1;
                }else{
                    $activePage = $_GET['page'];
                }
                $pagin = shop::getPagination($activePage);

                return $this->twig->render("admin/shop.html.twig", 
                            array(
                                'menu'=>$this->adminMenu,
                                'menuChild'=>$this->adminMenuChild,
                                'config'=>$this->config,
                                'pagin'=>$pagin,
                            )
                        );
        }
   }
   
   
}