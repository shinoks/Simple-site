<?php
require_once("../config/DbConn.php");
require_once("../config/DbConnGf.php");
                    
    use Cart\Cart;
    use Config\Config;
    use Menu\Menu;
    use Articles\Articles;
    use Shop\Shop;
    
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
        
        return $this->twig->render("shop.html.twig", array(
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