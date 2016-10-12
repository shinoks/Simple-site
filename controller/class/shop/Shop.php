<?php

namespace Shop;


class Shop {
    
    protected $db;
    
    function __construct($db)
    {
        $this->db = $db;
    }
    
    public function getAllOrders()
    {
        $stmt = $this->dbGf->prepare("SELECT *
            FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_user_info ON jos_vm_orders.user_id = jos_vm_user_info.user_id
            LEFT JOIN jos_vm_order_item ON jos_vm_orders.order_id = jos_vm_order_item.order_id 
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc 
            ");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrdersOnPage($start = 0,$end = 50)
    {
        $stmt = $this->dbGf->prepare("SELECT *
            FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_user_info ON jos_vm_orders.user_id = jos_vm_user_info.user_id
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc 
            LIMIT :start, :end");
        $stmt->bindParam(':start', $start, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':end', $end, $this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderById($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT *
            FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_user_info ON jos_vm_orders.user_id = jos_vm_user_info.user_id
            WHERE jos_vm_orders.order_id = :orderId
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc
            
            ");
            
        $stmt->bindParam('orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getPagination($activePage)
    {
        $limit = shop::getItemsOnSite();
        $start = $activePage * $limit -$limit;
        $end = $start + $limit;
        $start = (int)$start;
        $end = (int)$end;
        
        $ordersOnPage = shop::getOrdersOnPage($start,$end);

        $pages = shop::countOrders()/$limit;
        $pagin = array('orders'=>$ordersOnPage, 'pages'=>$pages, 'limit'=>$limit);
        
        return $pagin;
    }
    
    public function countOrders()
    {
        $stmt = $this->dbGf->prepare("SELECT COUNT(*) as `count` FROM jos_vm_orders");
        $stmt->execute();
        $count = $stmt->fetch();
        
        return $count['count'];
    }
    
    public function getItemsOnSite()
    {
        $itemsOnSite = 50;
        
        return $itemsOnSite;
    }
    
    public function deleteOrder()
    {
        $stmt = $this->dbGf->prepare();
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    
}
?>