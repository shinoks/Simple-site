<?php
require_once("../config/DbConn.php");
    
    use Cart\Cart;
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
        
        $this->db = dbConn::getConnection();
        $this->config = config::getConfig();
        $this->menu = menu::getMenuItems();
        $this->menuChild = menu::getChildMenuItems();
    }
    
    
    public function getStartSite()
    {
        if(isset($_GET['site'])){
            switch($_GET['site']){
                case 'shop':
                    
                break;
                case 'kontakt':
                    
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
   
}