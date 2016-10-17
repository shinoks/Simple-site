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
        $query = "SELECT *,COUNT(*) as `count`
            FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_user_info ON jos_vm_orders.user_id = jos_vm_user_info.user_id
            ";
        if(isset($this->searchInput)){
            $query .= " WHERE order_id = :order_id OR company LIKE :company OR last_name LIKE :lastName OR first_name LIKE :firstName OR extra_field_1 LIKE :extraField1";
        }
        $query .=" GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc 
            LIMIT :start, :end ";

        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(':start', $start, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':end', $end, $this->dbGf->PARAM_INT);
        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $stmt->bindParam(':order_id', $search);
            $stmt->bindParam(':company', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':firstName', $search);
            $stmt->bindParam(':extraField1', $search);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }    
    public function getCountOrdersOnSearch()
    {
        $query = "SELECT COUNT(*) as `count`
            FROM jos_vm_orders
            LEFT JOIN jos_vm_user_info ON jos_vm_orders.user_id = jos_vm_user_info.user_id
            ";
        if(isset($this->searchInput)){
            $query .= " WHERE order_id = :order_id OR company LIKE :company OR last_name LIKE :lastName OR first_name LIKE :firstName OR extra_field_1 LIKE :extraField1";
        }
        $stmt = $this->dbGf->prepare($query);

        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $stmt->bindParam(':order_id', $search);
            $stmt->bindParam(':company', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':firstName', $search);
            $stmt->bindParam(':extraField1', $search);
        }
        
        $stmt->execute();
        $count = $stmt->fetch();
        
        return $count['count'];
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
            
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getOrderProducts($orderId)
    {
        $orderId = (int) $orderId;
        
        $stmt = $this->dbGf->prepare("SELECT *
            FROM `jos_vm_order_item`
            LEFT JOIN jos_vm_product
            USING ( product_id )
            LEFT JOIN jos_vm_tax_rate ON jos_vm_tax_rate.tax_rate_id = jos_vm_product.product_tax_id 
            WHERE order_id = :orderId
            ");
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderProduct($orderId, $orderItemId)
    {
        $orderId = (int) $orderId;
        $orderItemId = (int) $orderItemId;
        
        $stmt = $this->dbGf->prepare("SELECT *
            FROM `jos_vm_order_item`
            LEFT JOIN jos_vm_product
            USING ( product_id )
            LEFT JOIN jos_vm_tax_rate ON jos_vm_tax_rate.tax_rate_id = jos_vm_product.product_tax_id 
            WHERE order_id = :orderId and order_item_id = :orderItemId
            ");
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->bindParam(':orderItemId',$orderItemId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getOrderPrice($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT product_item_price AS price, product_final_price AS final, product_quantity as quantity
        FROM `jos_vm_order_item`
        LEFT JOIN jos_vm_product
        USING ( product_id )
        WHERE order_id =:orderId");
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        //array(price,final)
        $prices = $stmt->fetchAll();
        $sumaNetto = 0;
        $sumaBrutto = 0;
        
        foreach($prices as $price){
            $sumaNetto = $sumaNetto+$price['price']*$price['quantity'];
            $sumaBrutto = $sumaBrutto+$price['final']*$price['quantity'];
            
        }
        $sum = array('price'=>$sumaNetto,'final'=>$sumaBrutto);
        
        return $sum;
    }
    
    public function getAllProducts()
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_vm_product");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getProductById($productId)
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_vm_product LEFT JOIN jos_vm_product_price USING(product_id) LEFT JOIN jos_vm_tax_rate ON jos_vm_product.product_tax_id = jos_vm_tax_rate.tax_rate_id WHERE product_id = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getAllUsers()
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_users");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getUserAddress($userId)
    {
        $stmt = $this->dbGf->prepare("SELECT *
        FROM jos_vm_user_info
        WHERE user_id =:userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
    
    public function deleteProductFromOrder($orderId, $orderItemId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `jos_vm_order_item` WHERE order_item_id = :orderItemId and order_id = :orderId ");
        $stmt->bindParam('orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->bindParam('orderItemId',$orderItemId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            (shop::updateOrderPrice($orderId))?$in=true:$in=false;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function addProductToOrder($orderId, $orderItemId, $userInfoId, $quantity = 1, $productAttribute = '')
    {
        $time = time();
        $product = shop::getProductById($orderItemId);

        $finalPrice = $product['product_price']+$product['product_price']*$product['tax_rate'];
        $orderStatus = 'P';
        $currency = 'PLN';
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_order_item`
        (`order_id`, `user_info_id`, `vendor_id`, `product_id`, `order_item_sku`, `order_item_name`, `product_quantity`, `product_item_price`, `product_final_price`, `order_item_currency`, `order_status`, `cdate`, `mdate`, `product_attribute`) 
        VALUES (
        :orderId,:userInfoId,1,:orderItemId,:orderItemSku,:orderItemName,:productQuantity,:productItemPrice,:productFinalPrice,:orderItemCurrency,:orderStatus,:cdate,:mdate, :productAttribute)
        ");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':orderItemId',$orderItemId);
        $stmt->bindParam(':userInfoId',$userInfoId);
        $stmt->bindParam(':orderItemSku',$product['product_sku']);
        $stmt->bindParam(':orderItemName',$product['product_name']);
        $stmt->bindParam(':productQuantity',$quantity);
        $stmt->bindParam(':productItemPrice',$product['product_price']);
        $stmt->bindParam(':productFinalPrice',$finalPrice);
        $stmt->bindParam(':orderItemCurrency',$currency);
        $stmt->bindParam(':orderStatus',$orderStatus);
        $stmt->bindParam(':cdate',$time);
        $stmt->bindParam(':mdate',$time);
        $stmt->bindParam(':productAttribute',$productAttribute);

        if($stmt->execute()){
            (shop::updateOrderPrice($orderId))?$in=true:$in=false;
        }
        
        return $in;
        
    }
    
    private function updateOrderPrice($orderId)
    {
        $prices = shop::getOrderPrice($orderId);
        
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `order_total`=:final,`order_subtotal`=:price WHERE order_id = :orderId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':price',$prices['price']);
        $stmt->bindParam(':final',$prices['final']);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateOrderUser($orderId,$userId)
    {
        $address = shop::getUserAddress($userId);
        foreach($address as $adress){
            if($adress['address_type'] == 'BT' ){
                $userInfoId = $adress['user_info_id'];
            }
        }
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `user_id`=:userId,`user_info_id`=:userInfoId WHERE `order_id`=:orderId ");
        $stmt ->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt ->bindParam(':userId',$userId,$this->dbGf->PARAM_INT);
        $stmt ->bindParam(':userInfoId',$userInfoId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateOrderSendTo($orderId,$userInfoId)
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `user_info_id` = :userInfoId WHERE `order_id`=:orderId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':userInfoId',$userInfoId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateOrderItem($orderId, $orderItemId, $quantity, $price, $finalPrice, $time, $productAttribute)
    {
        
        $product = shop::getOrderProduct($orderId, $orderItemId);
        ($quantity==$product['product_quantity'])?$quantity=$product['product_quantity']:'';
        
        if(round($price,2)!=round($product['product_item_price'],2)){
            $finalPrice = $price*(1+$product['tax_rate']);
        }else {
            $price=$product['product_item_price'];
            if(round($finalPrice,2)!=round($product['product_final_price'],2)){
                 $price = $finalPrice/(1+$product['tax_rate']);
            }else {
                $finalPrice = $product['product_final_price'];
            }
        }

        ($productAttribute==$product['product_attribute'])?$productAttribute=$product['product_attribute']:'';
        
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_order_item` SET `product_quantity`=:quantity,`product_item_price`=:price,`product_final_price`=:finalPrice,`mdate`=:time,`product_attribute`=:productAttribute 
        WHERE order_id = :orderId and order_item_id = :orderItemId");
        $stmt->bindParam(':orderId',$orderId, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':orderItemId',$orderItemId, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':quantity',$quantity, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':finalPrice',$finalPrice);
        $stmt->bindParam(':time',$time);
        $stmt->bindParam(':productAttribute',$productAttribute);
        
        ($stmt->execute())?$inf=true:$inf=false;
        
        if(shop::updateOrderPrice($orderId)==true && $inf == true){
            $inf == true;
        } else {
            $inf == false;
        }
        
        return $inf;
    }
    
    public function updateCustomerNote($orderId,$customerNote)
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `customer_note` = :customerNore WHERE `order_id`=:orderId");
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':customerNote', $customerNote);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function getPagination($activePage)
    {
        $limit = shop::getItemsOnSite();
        $start = $activePage * $limit -$limit;
        $end = $start + $limit;
        $start = (int)$start;
        $end = (int)$end;
        
        $ordersOnPage = shop::getOrdersOnPage($start,$end);
        
        $pages = round(shop::getCountOrdersOnSearch()/$limit);

        $pagin = array('orders'=>$ordersOnPage, 'pages'=>$pages, 'limit'=>$limit);
        
        return $pagin;
    }
    
    public function countOrders()
    {
        $query = "SELECT COUNT(*) as `count` FROM jos_vm_orders ";
        if(isset($this->searchInput)){
            $query .= " WHERE order_id = :order_id OR name LIKE :name OR username LIKE :username OR company LIKE :company OR last_name LIKE :lastName OR first_name LIKE :firstName";
        }
        $stmt = $this->dbGf->prepare($query);
        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $stmt->bindParam(':order_id', $search);
            $stmt->bindParam(':name', $search);
            $stmt->bindParam(':username', $search);
            $stmt->bindParam(':company', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':firstName', $search);
        }
        
        $stmt->execute();
        $count = $stmt->fetch();
        
        return $count['count'];
    }
    
    public function getItemsOnSite()
    {
        $itemsOnSite = 50;
        
        return $itemsOnSite;
    }
    
    public function getOrderStatuses()
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_vm_order_status");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function deleteOrder()
    {
        $stmt = $this->dbGf->prepare();
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    
}
?>