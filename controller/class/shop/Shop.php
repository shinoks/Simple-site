<?php

namespace Shop;


class Shop {
    
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
        $query = "SELECT littleNote,konsultantFirstName, konsultantLastName, jos_vm_orders.order_id, jos_vm_orders.cdate, jos_vm_orders.user_id, jos_vm_orders.order_total, jos_vm_orders.order_subtotal, name, jos_vm_order_user_info.company, 
        jos_vm_order_user_info.extra_field_1, jos_vm_order_user_info.extra_field_2, jos_vm_order_user_info.company as companySend, order_status_name, COUNT(*) as `count`
            FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_order_user_info ON jos_vm_orders.order_id = jos_vm_order_user_info.order_id
            LEFT JOIN konsultanci ON konsultanci.konsultantId = jos_vm_order_user_info.extra_field_2
            WHERE 1=1 ";
            
        if(isset($this->searchInput)){
            $query .= "and jos_vm_orders.order_id = :order_id OR company LIKE :company OR last_name LIKE :lastName OR first_name LIKE :firstName OR replace(jos_vm_order_user_info.extra_field_1,' ','') LIKE :extraField1 
            OR replace(jos_vm_order_user_info.extra_field_1,'-','') LIKE :extraField1";
        }
        if(isset($this->searchStatus)){
            $query .= " and order_status_code = :statusCode ";
        }
        $query .=" GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc 
            LIMIT :start, :end ";
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(':start', $start, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':end', $end, $this->dbGf->PARAM_INT);
        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $searchNip = str_replace('-','',$search);
            $stmt->bindParam(':order_id', $this->searchInput);
            $stmt->bindParam(':company', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':firstName', $search);
            $stmt->bindParam(':extraField1', $searchNip);
        }
        if(isset($this->searchStatus)){
            $stmt->bindParam(':statusCode',$this->searchStatus);
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
        $stmt = $this->dbGf->prepare("SELECT littleNote,ranking, administrationFee, order_info_id, konsultantFirstName, konsultantLastName, konsultanci.konsultantId, jos_vm_orders.order_id, jos_vm_orders.user_id, jos_vm_orders.user_info_id, jos_vm_orders.order_total, jos_vm_orders.order_subtotal, jos_vm_orders.order_status, 
        jos_vm_orders.cdate,jos_vm_orders.mdate, jos_vm_orders.customer_note, name, username, email, registerDate, order_status_name, order_status_code, address_type_name, 
        company, last_name, first_name, phone_1, phone_2, address_1, address_2, city, country, zip, user_email, extra_field_1, extra_field_2, payment_method_name
            FROM jos_vm_orders
            LEFT JOIN jos_vm_order_payment USING(order_id) 
            LEFT JOIN jos_vm_payment_method USING(payment_method_id) 
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            LEFT JOIN jos_vm_order_user_info ON jos_vm_orders.order_id = jos_vm_order_user_info.order_id
            LEFT JOIN konsultanci ON konsultanci.konsultantId = jos_vm_order_user_info.extra_field_2
            WHERE jos_vm_orders.order_id = :orderId and jos_vm_order_user_info.address_type = 'BT'
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc
            ");
            
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getOrderByIdFromUser($orderId,$userId)
    {
        $stmt = $this->dbGf->prepare("SELECT littleNote, jos_vm_orders.order_id, jos_vm_orders.user_id, jos_vm_orders.user_info_id, jos_vm_orders.order_total, 
        jos_vm_orders.order_subtotal, jos_vm_orders.order_status, jos_vm_orders.cdate, jos_vm_orders.customer_note, name, username, email, registerDate, 
        order_status_name, address_type_name, company, last_name, first_name, phone_1, phone_2, address_1, address_2, city, country, zip, user_email, extra_field_1, extra_field_2, payment_method_name
            FROM jos_vm_orders
            LEFT JOIN jos_vm_order_payment USING(order_id) 
            LEFT JOIN jos_vm_payment_method USING(payment_method_id) 
            LEFT JOIN jos_vm_order_user_info ON jos_vm_order_user_info.order_id=jos_vm_orders.order_id
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            WHERE jos_vm_orders.order_id = :orderId and jos_users.id = :userId and `address_type`='BT'
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc
            ");
            
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->bindParam(':userId',$userId,$this->dbGf->PARAM_INT);
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
    
    public function getOrderProductsFromUser($orderId,$userId)
    {
        $orderId = (int) $orderId;
        
        $stmt = $this->dbGf->prepare("SELECT *
            FROM `jos_vm_order_item`
            LEFT JOIN jos_vm_orders USING(order_id)
            LEFT JOIN jos_vm_product
            USING ( product_id )
            LEFT JOIN jos_vm_tax_rate ON jos_vm_tax_rate.tax_rate_id = jos_vm_product.product_tax_id 
            WHERE order_id = :orderId and jos_vm_orders.user_id = :userId
            ");
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->bindParam(':userId',$userId,$this->dbGf->PARAM_INT);
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
    
    public function getAllProducts($publish = '%')
    {
        $stmt = $this->dbGf->prepare("SELECT jos_vm_product.product_id,
        jos_vm_product.product_sku, jos_vm_product.product_desc, 
        jos_vm_product.product_thumb_image, jos_vm_product.product_full_image,
        jos_vm_product.product_publish, jos_vm_product.cdate,
        jos_vm_product.product_name,
        jos_vm_product_price.product_price,
        jos_vm_category.category_name,
        jos_vm_product_price.product_price+jos_vm_product_price.product_price*jos_vm_tax_rate.tax_rate as final_price
        FROM jos_vm_product 
        LEFT JOIN jos_vm_tax_rate ON jos_vm_product.product_tax_id = jos_vm_tax_rate.tax_rate_id 
        LEFT JOIN jos_vm_product_price USING(product_id)
        LEFT JOIN jos_vm_product_category_xref USING(product_id)
        LEFT JOIN jos_vm_category USING(category_id)
        WHERE jos_vm_product.product_publish LIKE :publish
        ");
        $stmt->bindParam(':publish',$publish);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getCategories($publish = '%')
    {
        $stmt = $this->dbGf->prepare("SELECT category_id, category_name, category_description, category_publish, cdate, list_order FROM jos_vm_category WHERE jos_vm_category.category_publish LIKE :publish");
        $stmt->bindParam(':publish',$publish);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getCategoryById($categoryId)
    {
        $stmt = $this->dbGf->prepare("SELECT category_id, category_name, category_description, category_publish, cdate, list_order, category_thumb_image, category_full_image FROM jos_vm_category WHERE category_id = :categoryId");
        $stmt->bindParam(":categoryId",$categoryId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getProductById($productId)
    {
        $stmt = $this->dbGf->prepare("SELECT tax_rate, jos_vm_product.product_id,
        jos_vm_product.product_sku, jos_vm_product.product_desc, 
        jos_vm_product.product_thumb_image, jos_vm_product.product_full_image,
        jos_vm_product.product_publish, jos_vm_product.cdate,
        jos_vm_product.product_name,
        jos_vm_product_price.product_price,
        jos_vm_category.category_name
        FROM jos_vm_product 
        LEFT JOIN jos_vm_product_price USING(product_id) 
        LEFT JOIN jos_vm_product_category_xref USING(product_id) 
        LEFT JOIN jos_vm_category USING(category_id) 
        LEFT JOIN jos_vm_tax_rate ON jos_vm_product.product_tax_id = jos_vm_tax_rate.tax_rate_id 
        WHERE jos_vm_product.product_id = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getAllUsers()
    {
        $stmt = $this->dbGf->prepare("SELECT id, username, name FROM jos_users");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getAllUsersInfo($start = 0,$end = 50)
    {
        
        $query = "SELECT * FROM jos_users LEFT JOIN jos_vm_user_info ON jos_users.id = jos_vm_user_info.user_id";
        if(isset($this->searchInput)){
            $query .= " WHERE name = :name OR username LIKE :username OR email LIKE :email OR first_name LIKE :firstName OR extra_field_1 LIKE :extraField1 OR last_name LIKE :lastName OR city LIKE :city ";
        }
        $query .=" ORDER BY jos_users.id desc 
            LIMIT :start, :end ";

        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(':start', $start, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':end', $end, $this->dbGf->PARAM_INT);
        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $stmt->bindParam(':name', $search);
            $stmt->bindParam(':username', $search);
            $stmt->bindParam(':email', $search);
            $stmt->bindParam(':firstName', $search);
            $stmt->bindParam(':extraField1', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':city', $search);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getUserById($userId)
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_users LEFT JOIN jos_vm_user_info ON jos_users.id = jos_vm_user_info.user_id WHERE user_id= :userId and address_type = 'BT'");
        $stmt->bindParam(':userId',$userId,$this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getUserByUsername($username)
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_users LEFT JOIN jos_vm_user_info ON jos_users.id = jos_vm_user_info.user_id WHERE username= :username");
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getUserOrders($userId)
    {
        $stmt = $this->dbGf->prepare("SELECT jos_vm_orders.order_id, jos_vm_orders.user_id, jos_vm_orders.user_info_id, jos_vm_orders.order_total, jos_vm_orders.order_subtotal, jos_vm_orders.order_tax, jos_vm_orders.order_id, jos_vm_orders.order_currency,  jos_vm_orders.order_status,jos_vm_orders.cdate, jos_vm_orders.mdate, jos_vm_orders.ship_method_id, jos_vm_orders.customer_note, jos_vm_orders.order_id, ip_address            
FROM jos_vm_orders
            LEFT JOIN jos_users ON jos_vm_orders.user_id = jos_users.id
            LEFT JOIN jos_vm_order_status ON jos_vm_orders.order_status = jos_vm_order_status.order_status_code
            WHERE jos_users.id = :userId
            GROUP BY jos_vm_orders.order_id
            ORDER BY jos_vm_orders.order_id desc 
            ");
        $stmt->bindParam("userId",$userId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getCountUsersOnSearch($start = 0,$end = 50)
    {
        $query = "SELECT COUNT(*) as `count` FROM jos_users LEFT JOIN jos_vm_user_info ON jos_users.id = jos_vm_user_info.user_id";
        if(isset($this->searchInput)){
            $query .= " WHERE name = :name OR username LIKE :username OR email LIKE :email OR first_name LIKE :firstName OR extra_field_1 LIKE :extraField1 OR last_name LIKE :lastName OR city LIKE :city ";
        }
        $query .=" ORDER BY jos_users.id desc 
            LIMIT :start, :end ";

        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(':start', $start, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':end', $end, $this->dbGf->PARAM_INT);
        
        if(isset($this->searchInput)){
            $search = '%'.$this->searchInput.'%';
            $stmt->bindParam(':name', $search);
            $stmt->bindParam(':username', $search);
            $stmt->bindParam(':email', $search);
            $stmt->bindParam(':firstName', $search);
            $stmt->bindParam(':extraField1', $search);
            $stmt->bindParam(':lastName', $search);
            $stmt->bindParam(':city', $search);
        }
        
        $stmt->execute();
        $count = $stmt->fetch();
        
        return $count['count'];
    }
    
    public function getUserAddress($userId)
    {
        $stmt = $this->dbGf->prepare("SELECT *
        FROM jos_vm_user_info
        WHERE user_id =:userId
        ORDER BY cdate
        ");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
    
    public function getUserSendAddress($userId)
    {
        $stmt = $this->dbGf->prepare("SELECT *
        FROM jos_vm_user_info
        WHERE user_id =:userId and address_type = 'ST'
        ORDER BY cdate
        ");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
    
    public function getPagination($activePage)
    {
        $limit = shop::getItemsOnSite();
        $start = $activePage * $limit -$limit;
        $start = (int)$start;
        
        $ordersOnPage = shop::getOrdersOnPage($start);
        
        $pages = round(shop::getCountOrdersOnSearch()/$limit);

        $pagin = array('orders'=>$ordersOnPage, 'pages'=>$pages, 'limit'=>$limit);
        
        return $pagin;
    }
    
    public function getPaginationUsers($activePage)
    {
        $limit = shop::getItemsOnSite();
        $start = $activePage * $limit -$limit;
        $end = $limit;
        $start = (int)$start;
        $end = (int)$end;
        
        $usersOnPage = shop::getAllUsersInfo($start,$end);
        
        $pages = round(shop::getCountUsersOnSearch()/$limit);

        $pagin = array('users'=>$usersOnPage, 'pages'=>$pages, 'limit'=>$limit);
        
        return $pagin;
    }
    
    public function getPaymentsMethod()
    {
        $stmt = $this->dbGf->prepare("SELECT payment_method_id, payment_method_name FROM `jos_vm_payment_method`");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getProductFromCategory($categoryId,$publish = '%')
    {
        $stmt = $this->dbGf->prepare("SELECT jos_vm_product.product_id,
        jos_vm_product.product_sku, jos_vm_product.product_desc, 
        jos_vm_product.product_thumb_image, jos_vm_product.product_full_image,
        jos_vm_product.product_publish, jos_vm_product.cdate,
        jos_vm_product.product_name,
        jos_vm_product_price.product_price,
        jos_vm_category.category_name,
        jos_vm_category.category_id,
        jos_vm_product_price.product_price+jos_vm_product_price.product_price*jos_vm_tax_rate.tax_rate as final_price
        FROM jos_vm_product 
        LEFT JOIN jos_vm_tax_rate ON jos_vm_product.product_tax_id = jos_vm_tax_rate.tax_rate_id 
        LEFT JOIN jos_vm_product_price USING(product_id)
        LEFT JOIN jos_vm_product_category_xref USING(product_id)
        LEFT JOIN jos_vm_category USING(category_id)
        WHERE jos_vm_product_category_xref.category_id = :categoryId and jos_vm_product.product_publish LIKE :publish
        ");
        $stmt->bindParam(':categoryId',$categoryId);
        $stmt->bindParam(':publish',$publish);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderHistory($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT * FROM jos_vm_order_history LEFT JOIN jos_vm_order_status USING(order_status_code) WHERE order_id = :orderId");
        $stmt->bindParam(":orderId", $orderId, $this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderAgrementHistory($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT agId, agOrderId, agFvNumber, agSubtotal, agPayed FROM agreementsHistory WHERE agOrderId = :orderId");
        $stmt->bindParam(":orderId", $orderId, $this->dbGf->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderUserInfo($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT `order_info_id`, `order_id`, `user_id`, `address_type`, `address_type_name`, `company`, `title`, `last_name`, `first_name`, 
        `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `user_email`, `extra_field_1`, `extra_field_2`, `extra_field_3`,
        `extra_field_4`, `extra_field_5`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, `bank_account_holder`, `bank_account_type` 
        FROM `jos_vm_order_user_info` 
        WHERE order_id = :orderId");
        $stmt ->bindParam(":orderId", $orderId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrderUserSend($orderId)
    {
        $stmt = $this->dbGf->prepare("SELECT `order_info_id`, `order_id`, `user_id`, `address_type`, `address_type_name`, `company`, `title`, `last_name`, `first_name`, 
        `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `user_email`, `extra_field_1`, `extra_field_2`, `extra_field_3`,
        `extra_field_4`, `extra_field_5`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, `bank_account_holder`, `bank_account_type` 
        FROM `jos_vm_order_user_info` 
        WHERE order_id = :orderId and address_type='ST'
        ");
        $stmt ->bindParam(":orderId", $orderId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getUserInfo($userInfoId)
    {
        $stmt = $this->dbGf->prepare("SELECT `user_info_id`, `user_id`, `address_type`, `address_type_name`, `company`, 
        `title`, `last_name`, `first_name`, `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, 
        `state`, `country`, `zip`, `user_email`, `extra_field_1`, `extra_field_2`, `extra_field_3`, `extra_field_4`, 
        `extra_field_5`, `cdate`, `mdate`, `perms`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, 
        `bank_account_holder`, `bank_account_type` 
        FROM `jos_vm_user_info` 
        WHERE user_info_id = :userInfoId");
        $stmt ->bindParam(":userInfoId", $userInfoId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    
    
    public function getOrdersByKonsultantId($konsultantId,$startDate,$endDate, $status='%%')
    {
        $stmt = $this->dbGf->prepare("SELECT orderIdDi, konsultantIdDi, sumDi, ranking, administrationFee, order_id, company, order_total, order_subtotal, cdate, konsultanci.konsultantId, order_status_name , order_status_code 
        FROM jos_vm_orders 
        LEFT JOIN konsultanci USING(konsultantId) 
        LEFT JOIN jos_vm_order_status ON jos_vm_order_status.order_status_code = jos_vm_orders.order_status 
        LEFT JOIN jos_vm_order_user_info USING(order_id) 
        LEFT JOIN dividedOrders ON dividedOrders.orderIdDi = jos_vm_orders.order_id
        WHERE konsultantId = :konsultantId and order_status_code LIKE :status
        AND cdate BETWEEN :startDate AND :endDate GROUP BY order_id
        ");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getOrdersByKonsultantIdWithoutStatus($konsultantId,$startDate,$endDate,$status)
    {
        $stmt = $this->dbGf->prepare("SELECT administrationFee, order_id, company, order_total, order_subtotal, cdate, konsultanci.konsultantId, order_status_name , order_status_code 
        FROM jos_vm_orders 
        LEFT JOIN konsultanci USING(konsultantId) 
        LEFT JOIN jos_vm_order_status ON jos_vm_order_status.order_status_code = jos_vm_orders.order_status 
        LEFT JOIN jos_vm_order_user_info USING(order_id) 
        WHERE konsultantId = :konsultantId and order_status_code <> :status
        AND cdate BETWEEN :startDate AND :endDate GROUP BY order_id
        ");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getSumOrdersByKonsultantId($konsultantId,$startDate,$endDate, $status='%%', $status2='%%')
    {
        $stmt = $this->dbGf->prepare("SELECT SUM(order_subtotal) as sum, COUNT(*) as count
        FROM jos_vm_orders 
        LEFT JOIN konsultanci USING(konsultantId) 
        LEFT JOIN jos_vm_order_status ON jos_vm_order_status.order_status_code = jos_vm_orders.order_status 
        LEFT JOIN jos_vm_order_user_info USING(order_id) 
        WHERE konsultantId = :konsultantId and  address_type='BT' and (order_status_code = :status or order_status_code = :status2)
        AND cdate BETWEEN :startDate AND :endDate
        ");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":status2",$status2);
        $stmt->execute();
        
        return $stmt->fetch();
    }    
    
    public function getSumOrdersByDates($startDate,$endDate, $status='X')
    {
        $stmt = $this->dbGf->prepare("SELECT SUM(order_subtotal) as sum
        FROM jos_vm_orders 
        WHERE order_status <> :status
        AND cdate BETWEEN :startDate AND :endDate
        ");
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getSumOrdersByDatesAndStatusAndKlasa($startDate,$endDate, $status, $klasa)
    {
        $klasa = (int)$klasa;
        $stmt = $this->dbGf->prepare("SELECT SUM(order_subtotal) as sum
        FROM jos_vm_orders 
        LEFT JOIN konsultanci USING(konsultantId)
        WHERE order_status = :status
        AND cdate BETWEEN :startDate AND :endDate AND klasa = :klasa
        ");
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":klasa",$klasa,$this->dbGf->PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['sum'];
    }
    
    public function getCountOrdersByDates($startDate,$endDate, $status='X')
    {
        $stmt = $this->dbGf->prepare("SELECT COUNT(*) as count
        FROM jos_vm_orders 
        WHERE order_status <> :status
        AND cdate BETWEEN :startDate AND :endDate
        ");
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getCountProductsByDates($startDate,$endDate, $status='X')
    {
        $stmt = $this->dbGf->prepare("SELECT COUNT(*) as count, order_item_name
        FROM jos_vm_orders 
        LEFT JOIN jos_vm_order_item USING(order_id)
        WHERE jos_vm_orders.order_status <> :status
        AND jos_vm_orders.cdate BETWEEN :startDate  AND :endDate 
        GROUP BY product_id 
        ORDER BY count desc
        ");
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getPremia($sum)
    {
        if($sum>10300){
            $premia = $sum*0.1;
        }elseif($sum>9300){
            $premia = $sum*0.09;
        }elseif($sum>8300){
            $premia = $sum*0.08;
        }elseif($sum>7300){
            $premia = $sum*0.07;
        }elseif($sum>6350){
            $premia = $sum*0.05;
        }elseif($sum>5800){
            $premia = $sum*0.04;
        }else{
            $premia = 0;
        }
            
        return $premia;
    }
    
    public function getPremiaBrak($sum)
    {
        if($sum>10300){
            $premiaBrak = 'MAX';
        }elseif($sum>9300){
            $premiaBrak = 10300-$sum;
        }elseif($sum>8300){
            $premiaBrak = 9300-$sum;
        }elseif($sum>7300){
            $premiaBrak = 8300-$sum;
        }elseif($sum>6350){
            $premiaBrak = 7300-$sum;
        }elseif($sum>5800){
            $premiaBrak = 6350-$sum;
        }else{
            $premiaBrak = 5800-$sum;
        }
            
        return $premiaBrak;
    }
    
    public function getRanking($konsultantId, $startDate, $endDate, $status='Z')
    {
        $stmt = $this->dbGf->prepare("SELECT SUM(ranking) FROM jos_vm_orders WHERE cdate BETWEEN :startDate AND :endDate AND konsultantId = :konsultantId");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->bindParam(":startDate",$startDate);
        $stmt->bindParam(":endDate",$endDate);
        $stmt->execute();
        $ranking = $stmt->fetch();
        
        return $ranking['ranking'];
    }
    
    
    public function getDodatkiByKonsultantId($year, $month, $konsultantId)
    {
        $year = (int) $year;
        $month = (int) $month;
        $konsultantId = (int) $konsultantId;
        $stmt = $this->dbGf->prepare("SELECT * FROM konsultantDodatek WHERE year=:year and month=:month and konsultantId=:konsultantId");
        $stmt->bindParam(':year',$year, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':month',$month, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':konsultantId',$konsultantId, $this->dbGf->PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['addon'];
    }
    
    public function getDividedOrders($orderId){
        $stmt = $this->dbGf->prepare("SELECT `orderIdDi`, `konsultantIdDi`, `sumDi`, `cdateDi`, `konsultantFirstName`, `konsultantLastName` FROM `dividedOrders`
        LEFT JOIN konsultanci ON konsultanci.konsultantId = dividedOrders.konsultantIdDi
        WHERE orderIdDi = :orderId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getSumDividedOrders($orderId){
        $stmt = $this->dbGf->prepare("SELECT SUM('sumDi') FROM `dividedOrders`
        LEFT JOIN konsultanci ON konsultanci.konsultantId = dividedOrders.konsultantIdDi
        WHERE orderIdDi = :orderId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['sum'];
    }
    
    public function getPaidDividedOrders($startDate, $endDate, $konsultantId, $status='Z'){
        $stmt = $this->dbGf->prepare("SELECT `orderIdDi`, `konsultantIdDi`, `sumDi`, `cdateDi`, `konsultantFirstName`, `konsultantLastName` FROM `dividedOrders`
        LEFT JOIN konsultanci ON konsultanci.konsultantId = dividedOrders.konsultantIdDi
        LEFT JOIN jos_vm_orders ON jos_vm_orders.order_id = dividedOrders.orderIdDi 
        WHERE cdate BETWEEN :startDate  AND :endDate and konsultantIdDi = :konsultantId AND order_status = :status");
        $stmt->bindParam(':konsultantId',$konsultantId);
        $stmt->bindParam(':startDate',$startDate);
        $stmt->bindParam(':endDate',$endDate);
        $stmt->bindParam(':status',$status);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getAgrementsHistoryOrder()
    {
        $stmt = $this->dbGf->prepare("SELECT jos_vm_orders.cdate, order_status_name, order_id, user_id, order_subtotal,  `agOrderId`, `agFvNumber`, `agSubtotal`, `agPayed`, `agDate`  
        FROM `jos_vm_orders` 
        LEFT JOIN jos_vm_order_item USING(order_id) 
        LEFT JOIN jos_vm_order_status ON jos_vm_order_status.order_status_code = jos_vm_orders.order_status 
        LEFT JOIN konsultanci USING(konsultantId) 
        RIGHT JOIN agreementsHistory ON agreementsHistory.agOrderId = jos_vm_orders.order_id 
        GROUP BY agId
        ORDER BY jos_vm_orders.cdate desc");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getAgrementsOrders()
    {
        $stmt = $this->dbGf->prepare("SELECT jos_vm_orders.cdate, order_status_name, order_id, user_id, order_subtotal 
        FROM `jos_vm_orders` 
        LEFT JOIN jos_vm_order_item USING(order_id) 
        LEFT JOIN jos_vm_order_status ON jos_vm_order_status.order_status_code = jos_vm_orders.order_status 
        WHERE product_id = 83
        GROUP BY order_id
        ORDER BY jos_vm_orders.cdate desc");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    
    public function addAgrementsHistory($orderId,$fvNumber,$date, $subtotal, $payed)
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `agreementsHistory` (`agOrderId`, `agFvNumber`, `agSubtotal`, `agPayed`, `agDate`) VALUES (:orderId,:fvNumber,:subtotal,:payed,:date)");
        $stmt->bindParam(':orderId',$orderId, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':fvNumber',$fvNumber);
        $stmt->bindParam(':subtotal',$subtotal, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':payed',$payed, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':date',$date);
        
        return $stmt->execute();
    }
    
    public function addDivideOrder($orderId, $konsultantId, $sum, $cdate){
        $stmt = $this->dbGf->prepare("INSERT INTO `dividedOrders`(`orderIdDi`, `konsultantIdDi`, `sumDi`, `cdateDi`) VALUES (:orderId,:konsultantId,:sum,:cdate)");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':konsultantId',$konsultantId);
        $stmt->bindParam(':sum',$sum);
        $stmt->bindParam(':cdate',$cdate);
        
        return $stmt->execute();
    }
    
    public function addHistoryItem($orderId,$statusCode,$comments = NULL,$notified = 0, $userId=NULL)
    {
        $time = date("Y-m-d H:i:s",time());
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_order_history`(`order_id`, `order_status_code`, `date_added`, `customer_notified`, `comments`, `userId`) VALUES (:orderId,:statusCode,:time,:notified,:comments,:userId)");
        $stmt->bindParam(':orderId',$orderId,$this->dbGf->PARAM_INT);
        $stmt->bindParam(':statusCode',$statusCode);
        $stmt->bindParam(':time',$time);
        $stmt->bindParam(':notified',$notified,$this->dbGf->PARAM_INT);
        $stmt->bindParam(':comments',$comments);
        $stmt->bindParam(':userId',$userId);
        
        return $stmt->execute();
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
    
    public function addUserInfo($userId,$addressTypeName='',$company='',$lastName='',$firstName='',$phone='',$phone2='',$address='',$address2='',$city='',$zip=' ',$extraField1='',$extraField2='',$addressType = 'ST', $userEmail = '')
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_user_info`
        (`user_info_id`, `user_id`, `address_type`, `address_type_name`,
        `company`, `last_name`, `first_name`, 
        `phone_1`, `phone_2`, `address_1`, `address_2`, `city`, `zip`,
        `extra_field_1`, `extra_field_2`, `cdate`, `user_email`) 
        VALUES (UUID(),:userId,:addressType,:addressTypeName,:company,
        :lastName,:firstName,:phone,:phone2,:address,:address2,
        :city,:zip,:extraField1,:extraField2,:cdate, :userEmail)");
        
        $stmt->bindParam(":userId",$userId);
        $stmt->bindParam(":addressType",$addressType);
        $stmt->bindParam(":addressTypeName",$addressTypeName);
        $stmt->bindParam(":company",$company);
        $stmt->bindParam(":lastName",$lastName);
        $stmt->bindParam(":firstName",$firstName);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":phone2",$phone2);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":address2",$address2);
        $stmt->bindParam(":city",$city);
        $stmt->bindParam(":zip",$zip);
        $stmt->bindParam(":extraField1",$extraField1);
        $stmt->bindParam(":extraField2",$extraField2);
        $stmt->bindParam(":cdate",time());
        $stmt->bindParam(":userEmail",$userEmail);
        
        return $stmt->execute();
    }
    
    public function addOrderUserInfo($orderId,$userId,$addressType,$addressTypeName,$company,$title=NULL,$lastName,$firstName,$middleName=NULL,$phone1,$phone2='',$fax=NULL,$address1,$address2=NULL,$city,$state='',$country='PL',$zip,
        $userEmail,$extraField1,$extraField2,$extraField3=NULL,$extraField4=NULL,$extraField5=NULL,$bankAccountNr='',$bankName='',$bankSortCode='',$bankIban='',$bankAccountHolder='',$bankAccountType='')
    {
        $stmt=$this->dbGf->prepare("INSERT INTO `jos_vm_order_user_info`(`order_id`, `user_id`, `address_type`, `address_type_name`, `company`, `title`, 
        `last_name`, `first_name`, `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `user_email`, `extra_field_1`, 
        `extra_field_2`, `extra_field_3`, `extra_field_4`, `extra_field_5`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, `bank_account_holder`, `bank_account_type`) 
        VALUES (:orderId,:userId,:addressType,:addressTypeName,:company,:title,:lastName,:firstName,:middleName,:phone1,:phone2,:fax,:address1,:address2,:city,:state,:country,:zip,
        :userEmail,:extraField1,:extraField2,:extraField3,:extraField4,:extraField5,:bankAccountNr,:bankName,:bankSortCode,:bankIban,:bankAccountHolder,:bankAccountType)");
        $stmt->bindParam(":orderId",$orderId);
        $stmt->bindParam(":userId",$userId);
        $stmt->bindParam(":addressType",$addressType);
        $stmt->bindParam(":addressTypeName",$addressTypeName);
        $stmt->bindParam(":company",$company);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":lastName",$lastName);
        $stmt->bindParam(":firstName",$firstName);
        $stmt->bindParam(":middleName",$middleName);
        $stmt->bindParam(":phone1",$phone1);
        $stmt->bindParam(":phone2",$phone2);
        $stmt->bindParam(":fax",$fax);
        $stmt->bindParam(":address1",$address1);
        $stmt->bindParam(":address2",$address2);
        $stmt->bindParam(":city",$city);
        $stmt->bindParam(":state",$state);
        $stmt->bindParam(":country",$country);
        $stmt->bindParam(":zip",$zip);
        $stmt->bindParam(":userEmail",$userEmail);
        $stmt->bindParam(":extraField1",$extraField1);
        $stmt->bindParam(":extraField2",$extraField2);
        $stmt->bindParam(":extraField3",$extraField3);
        $stmt->bindParam(":extraField4",$extraField4);
        $stmt->bindParam(":extraField5",$extraField5);
        $stmt->bindParam(":bankAccountNr",$bankAccountNr);
        $stmt->bindParam(":bankName",$bankName);
        $stmt->bindParam(":bankSortCode",$bankSortCode);
        $stmt->bindParam(":bankIban",$bankIban);
        $stmt->bindParam(":bankAccountHolder",$bankAccountHolder);
        $stmt->bindParam(":bankAccountType",$bankAccountType);
        
        return $stmt->execute();
    }
    
    public function addCategory($categoryName, $categoryDescription = '', $categoryThumbImage='web/images/shop/emptyImageThumb.jpg', $categoryFullImage='web/images/shop/emptyImage.jpg', $categoryPublish = 'Y', $cdate = 'NOW()', $listOrder = '')
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_category`
        (`category_name`, `category_description`, `category_thumb_image`, 
        `category_full_image`, `category_publish`, `cdate`, `list_order`) 
        VALUES
        (:categoryName,:categoryDescription,:categoryThumbImage,:categoryFullImage,:categoryPublish,:cdate,:listOrder)");
        $stmt->bindParam(":categoryName",$categoryName);
        $stmt->bindParam(":categoryDescription",$categoryDescription);
        $stmt->bindParam(":categoryThumbImage",$categoryThumbImage);
        $stmt->bindParam(":categoryFullImage",$categoryFullImage);
        $stmt->bindParam(":categoryPublish",$categoryPublish);
        $stmt->bindParam(":cdate",$cdate);
        $stmt->bindParam(":listOrder",$listOrder);
        
        return $stmt->execute();
    }
    
    public function addOrder($userId,$vendorId=1,$orderNumber=1,$userInfoId,$orderTotal,$orderSubtotal,$orderTax,$orderTaxDetails='', $orderDiscount=0, $orderCurrency='PLN',
                            $orderStatus='P', $orderShipping=0, $orderShippingTax = 0, $couponDiscount=0, $couponCode='',  $shipMethodId, $customerNote='', $ipAddress, $konsultantId)
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_orders`
        ( `user_id`, `vendor_id`, `order_number`, `user_info_id`, `order_total`, `order_subtotal`, `order_tax`, `order_tax_details`, `order_shipping`, `order_shipping_tax`, `coupon_discount`, `coupon_code`, `order_discount`, `order_currency`, 
        `order_status`, `cdate`, `mdate`, `ship_method_id`, `customer_note`, `ip_address`, `konsultantId`) 
        VALUES (:userId,:vendorId,:orderNumber,:userInfoId,:orderTotal,:orderSubtotal,:orderTax,:orderTaxDetails,:orderShipping,:orderShippingTax,:couponDiscount,:couponCode,:orderDiscount,:orderCurrency,:orderStatus,:cdate,:mdate,
        :shipMethodId,:customerNote,:ipAddress,:konsultantId)");
        $stmt->bindParam(':userId',$userId);
        $stmt->bindParam(':vendorId',$vendorId);
        $stmt->bindParam(':orderNumber',$orderNumber);
        $stmt->bindParam(':userInfoId',$userInfoId);
        $stmt->bindParam(':orderTotal',$orderTotal);
        $stmt->bindParam(':orderSubtotal',$orderSubtotal);
        $stmt->bindParam(':orderTax',$orderTax);
        $stmt->bindParam(':orderTaxDetails',$orderTaxDetails);
        $stmt->bindParam(':orderShipping',$orderShipping);
        $stmt->bindParam(':orderShippingTax',$orderShippingTax);
        $stmt->bindParam(':couponDiscount',$couponDiscount);
        $stmt->bindParam(':couponCode',$couponCode);
        $stmt->bindParam(':orderStatus',$orderStatus);
        $stmt->bindParam(':orderDiscount',$orderDiscount);
        $stmt->bindParam(':orderCurrency',$orderCurrency);
        $stmt->bindParam(':cdate',time());
        $stmt->bindParam(':mdate',time());
        $stmt->bindParam(':shipMethodId',$shipMethodId);
        
        $stmt->bindParam(':customerNote',$customerNote);
        $stmt->bindParam(':ipAddress',$ipAddress);
        $stmt->bindParam(':konsultantId',$konsultantId);
        $stmt->execute();
        
        return $this->dbGf->lastInsertId();
    }
    
    public function addProductToNewOrder($orderId,$userInfoId,$vendorId = 1,$productId,$orderItemSku, $orderItemName,$productQuantity, $productItemPrice, $productFinalPrice, $orderItemCurrency = 'PLN', $orderStatus='!', $producAttribute='')
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_order_item`
        (`order_id`, `user_info_id`, `vendor_id`, `product_id`, `order_item_sku`, `order_item_name`, `product_quantity`, `product_item_price`, `product_final_price`, `order_item_currency`, `order_status`, `cdate`, `mdate`, `product_attribute`) 
        VALUES (:orderId, :userInfoId, :vendorId, :productId, :orderItemSku, :orderItemName,:productQuantity, :productItemPrice, :productFinalPrice, :orderItemCurrency, :orderStatus, :cdate, :mdate, :producAttribute)");
        $stmt->bindParam(":orderId",$orderId);
        $stmt->bindParam(":userInfoId",$userInfoId);
        $stmt->bindParam(":vendorId",$vendorId);
        $stmt->bindParam(":productId",$productId);
        $stmt->bindParam(":orderItemSku",$orderItemSku);
        $stmt->bindParam(":orderItemName",$orderItemName);
        $stmt->bindParam(":productQuantity",$productQuantity);
        $stmt->bindParam(":productItemPrice",$productItemPrice);
        $stmt->bindParam(":productFinalPrice",$productFinalPrice);
        $stmt->bindParam(":orderItemCurrency",$orderItemCurrency);
        $stmt->bindParam(":orderStatus",$orderStatus);
        $stmt->bindParam(":producAttribute",$producAttribute);
        $stmt->bindParam(":cdate",time());
        $stmt->bindParam(":mdate",time());
        
        return $stmt->execute();
    }
    
    public function addPaymentMethod($orderId,$paymentMethodId,$orderPaymentCode='',$orderPaymentNumber=NULL, $orderPaymentExpire=NULL, $orderPaymentName=NULL, $orderPaymentLog = '', $orderPaymentTransId = '')
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_vm_order_payment`(`order_id`, `payment_method_id`, `order_payment_code`, `order_payment_number`, `order_payment_expire`, `order_payment_name`, `order_payment_log`, `order_payment_trans_id`)
        VALUES (:orderId,:paymentMethodId,:orderPaymentCode,:orderPaymentNumber,:orderPaymentExpire,:orderPaymentName,:orderPaymentLog,:orderPaymentTransId)");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':paymentMethodId',$paymentMethodId);
        $stmt->bindParam(':orderPaymentCode',$orderPaymentCode);
        $stmt->bindParam(':orderPaymentNumber',$orderPaymentNumber);
        $stmt->bindParam(':orderPaymentExpire',$orderPaymentExpire);
        $stmt->bindParam(':orderPaymentName',$orderPaymentName);
        $stmt->bindParam(':orderPaymentLog',$orderPaymentLog);
        $stmt->bindParam(':orderPaymentTransId',$orderPaymentTransId);
        
        return $stmt->execute();
    }
    
    private function addAddon($year,$month,$konsultantId,$addon)
    {
        $stmt = $this->dbGf->prepare("INSERT INTO `konsultantDodatek`(`konsultantId`, `year`, `month`, `addon`) 
        VALUES (:konsultantId,:year,:month,:addon)");
        $stmt->bindParam(':konsultantId',$konsultantId);
        $stmt->bindParam(':year',$year);
        $stmt->bindParam(':month',$month);
        $stmt->bindParam(':addon',$addon);
        
        return $stmt->execute();
    }
    
    public function updateAgrementsHistoryStatus($agId,$payed)
    {
        $stmt = $this->dbGf->prepare("UPDATE agreemetsHistory SET agPayed = :payed WHERE agId = :agId");
        $stmt->bindParam(':agId',$agId, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':payed',$payed, $this->dbGf->PARAM_INT);
        
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        return $in;
    }
    
    public function updateOrderRanking($orderId, $ranking)
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET 
        `ranking`=:ranking
        WHERE order_id = :orderId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':ranking',$ranking);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        return $in;
    }
    public function updateAddon($year,$month,$konsultantId,$addon)
    {
        $addo = shop::getDodatkiByKonsultantId($year,$month,$konsultantId,$addon);
        if($addo == NULL){
            $ad = shop::addAddon($year,$month,$konsultantId,$addon);
            
            return $ad;
        }else {
            $stmt = $this->dbGf->prepare("UPDATE `konsultantDodatek` SET 
            `addon`=:addon
            WHERE year = :year AND month = :month AND konsultantId = :konsultantId");
            $stmt->bindParam(':year',$year);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':konsultantId',$konsultantId);
            $stmt->bindParam(':addon',$addon);        
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if($count == 1 ){
                $in = true;
            }else {
                $in = false;
            }
            return $in;
            }
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
    
    public function updateAdministrationFee($orderId,$administrationFee,$userId='')
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `administrationFee` = :administrationFee WHERE `order_id` =:orderId;");
        $stmt->bindParam(':orderId',$orderId, $this->dbGf->PARAM_INT);
        $stmt->bindParam(':administrationFee',$administrationFee, $this->dbGf->PARAM_INT);
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
    
    private function updateOrderUserInfoId($orderId,$userId,$userInfoId)
    {
        $address = shop::getUserAddress($userId);
        
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
        shop::deleteOrderUserInfo($orderId, $addressType='ST');
            $userInfo = shop::getUserInfo($userInfoId);
            if(shop::addOrderUserInfo($orderId,$userInfo['user_id'],'ST',$userInfo['address_type_name'],$userInfo['company'],NULL,$userInfo['last_name'],$userInfo['first_name'],NULL,$userInfo['phone_1'],$userInfo['phone_2'],$userInfo['fax'],$userInfo['address_1'],$userInfo['address_2'],$userInfo['city'],$userInfo['state'],$userInfo['country'],$userInfo['zip'],
        $userInfo['user_email'],$userInfo['extra_field_1'],$userInfo['extra_field_2'],NULL,NULL,NULL,'','','','','','')){
                shop::updateOrderUserInfoId($orderId,$userInfo['user_id'],$userInfo['user_info_id']);
                $in = true;
                shop::addHistoryItem($orderId,'-','Zmiana adresu wysyłki',$userId,$this->dbGf->PARAM_INT);
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
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `customer_note` = :customerNote WHERE `order_id`=:orderId");
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
    
    public function updateLittleNote($orderId,$littleNote)
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `littleNote` = :littleNote WHERE `order_id`=:orderId");
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':littleNote', $littleNote);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateOrderStatus($orderId,$statusCode,$comments = NULL)
    {
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_orders` SET `order_status`=:statusCode WHERE `order_id`=:orderId");
        $stmt->bindParam(":orderId",$orderId);
        $stmt->bindParam(":statusCode",$statusCode);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
            shop::addHistoryItem($orderId,$statusCode,$comments);
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateOrderUserInfo($order_info_id,$userId,$company = NULL,$firstName = '' ,$lastName = NULL,$email =NULL,$phone=NULL,$phone2=NULL,$address=NULL,$city=NULL,$zip=NULL,$extraField1=NULL,$extraField2=NULL)
    {
        $query = "UPDATE jos_vm_order_user_info SET ";
        $a = 1;
        
        if(!empty($company)){
            $a++;
            $query .= "`company`=:company ";
        }
        if(!empty($firstName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`first_name`=:firstName ";
        }
        if(!empty($lastName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`last_name`=:lastName ";
        }
        if(!empty($email)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`user_email`=:email ";
        }
        if(!empty($phone)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_1`=:phone ";
        }
        if(!empty($phone2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_2`=:phone2 ";
        }
        if(!empty($address)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`address_1`=:address ";
        }
        if(!empty($city)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`city`=:city ";
        }
        if(!empty($zip)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`zip`=:zip ";
        }
        if(!empty($extraField1)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_1`=:extraField1 ";
        }
        if(!empty($extraField2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_2`=:extraField2 ";
        }
        
        $query .= "WHERE order_info_id = :order_info_id";
        
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(":order_info_id",$order_info_id);
        if(!empty($company)){
            $stmt->bindParam(":company",$company);
        }
        if(!empty($firstName)){
            $stmt->bindParam(":firstName",$firstName);
        }
        if(!empty($lastName)){
            $stmt->bindParam(":lastName",$lastName);
        }
        if(!empty($email)){
            $stmt->bindParam(":email",$email);
        }
        if(!empty($phone)){
            $stmt->bindParam(":phone",$phone);
        }
        if(!empty($phone2)){
            $stmt->bindParam(":phone2",$phone2);
        }
        if(!empty($address)){
            $stmt->bindParam(":address",$address);
        }
        if(!empty($city)){
            $stmt->bindParam(":city",$city);
        }
        if(!empty($zip)){
            $stmt->bindParam(":zip",$zip);
        }
        if(!empty($extraField1)){
            $stmt->bindParam(":extraField1",$extraField1);
        }
        if(!empty($extraField2)){
            $stmt->bindParam(":extraField2",$extraField2);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = $stmt->errorInfo();
        }
        
        return $in;
    }
    public function updateUserInfo($userId,$company = NULL,$firstName = '' ,$lastName = NULL,$email =NULL,$phone=NULL,$phone2=NULL,$address=NULL,$city=NULL,$zip=NULL,$extraField1=NULL,$extraField2=NULL)
    {
        $query = "UPDATE jos_vm_user_info SET ";
        $a = 1;
        
        if(!empty($company)){
            $a++;
            $query .= "`company`=:company ";
        }
        if(!empty($firstName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`first_name`=:firstName ";
        }
        if(!empty($lastName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`last_name`=:lastName ";
        }
        if(!empty($email)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`user_email`=:email ";
        }
        if(!empty($phone)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_1`=:phone ";
        }
        if(!empty($phone2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_2`=:phone2 ";
        }
        if(!empty($address)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`address_1`=:address ";
        }
        if(!empty($city)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`city`=:city ";
        }
        if(!empty($zip)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`zip`=:zip ";
        }
        if(!empty($extraField1)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_1`=:extraField1 ";
        }
        if(!empty($extraField2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_2`=:extraField2 ";
        }
        
        $query .= "WHERE user_id = :userId AND address_type='BT'";
        
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(":userId",$userId);
        if(!empty($company)){
            $stmt->bindParam(":company",$company);
        }
        if(!empty($firstName)){
            $stmt->bindParam(":firstName",$firstName);
        }
        if(!empty($lastName)){
            $stmt->bindParam(":lastName",$lastName);
        }
        if(!empty($email)){
            $stmt->bindParam(":email",$email);
        }
        if(!empty($phone)){
            $stmt->bindParam(":phone",$phone);
        }
        if(!empty($phone2)){
            $stmt->bindParam(":phone2",$phone2);
        }
        if(!empty($address)){
            $stmt->bindParam(":address",$address);
        }
        if(!empty($city)){
            $stmt->bindParam(":city",$city);
        }
        if(!empty($zip)){
            $stmt->bindParam(":zip",$zip);
        }
        if(!empty($extraField1)){
            $stmt->bindParam(":extraField1",$extraField1);
        }
        if(!empty($extraField2)){
            $stmt->bindParam(":extraField2",$extraField2);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateUserAddressInfo($userId,$company = NULL,$firstName = '' ,$lastName = NULL,$email =NULL,$phone=NULL,$phone2=NULL,$address=NULL,$city=NULL,$zip=NULL,$extraField1=NULL,$extraField2=NULL)
    {
        $query = "UPDATE jos_vm_user_info SET ";
        $a = 1;
        
        if(!empty($company)){
            $a++;
            $query .= "`company`=:company ";
        }
        if(!empty($firstName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`first_name`=:firstName ";
        }
        if(!empty($lastName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`last_name`=:lastName ";
        }
        if(!empty($email)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`user_email`=:email ";
        }
        if(!empty($phone)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_1`=:phone ";
        }
        if(!empty($phone2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_2`=:phone2 ";
        }
        if(!empty($address)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`address_1`=:address ";
        }
        if(!empty($city)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`city`=:city ";
        }
        if(!empty($zip)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`zip`=:zip ";
        }
        if(!empty($extraField1)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_1`=:extraField1 ";
        }
        if(!empty($extraField2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_2`=:extraField2 ";
        }
        
        $query .= "WHERE user_id = :userId";
        
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(":userId",$userId);
        if(!empty($company)){
            $stmt->bindParam(":company",$company);
        }
        if(!empty($firstName)){
            $stmt->bindParam(":firstName",$firstName);
        }
        if(!empty($lastName)){
            $stmt->bindParam(":lastName",$lastName);
        }
        if(!empty($email)){
            $stmt->bindParam(":email",$email);
        }
        if(!empty($phone)){
            $stmt->bindParam(":phone",$phone);
        }
        if(!empty($phone2)){
            $stmt->bindParam(":phone2",$phone2);
        }
        if(!empty($address)){
            $stmt->bindParam(":address",$address);
        }
        if(!empty($city)){
            $stmt->bindParam(":city",$city);
        }
        if(!empty($zip)){
            $stmt->bindParam(":zip",$zip);
        }
        if(!empty($extraField1)){
            $stmt->bindParam(":extraField1",$extraField1);
        }
        if(!empty($extraField2)){
            $stmt->bindParam(":extraField2",$extraField2);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    public function updateUserInfoId($userId,$company = NULL,$firstName = '' ,$lastName = NULL,$email =NULL,$phone=NULL,$phone2=NULL,$address=NULL,$city=NULL,$zip=NULL,$extraField1=NULL,$extraField2=NULL,$userInfoId)
    {
        $query = "UPDATE jos_vm_user_info SET ";
        $a = 1;
        
        if(!empty($company)){
            $a++;
            $query .= "`company`=:company ";
        }
        if(!empty($firstName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`first_name`=:firstName ";
        }
        if(!empty($lastName)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`last_name`=:lastName ";
        }
        if(!empty($email)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`user_email`=:email ";
        }
        if(!empty($phone)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_1`=:phone ";
        }
        if(!empty($phone2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`phone_2`=:phone2 ";
        }
        if(!empty($address)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`address_1`=:address ";
        }
        if(!empty($city)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`city`=:city ";
        }
        if(!empty($zip)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`zip`=:zip ";
        }
        if(!empty($extraField1)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_1`=:extraField1 ";
        }
        if(!empty($extraField2)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`extra_field_2`=:extraField2 ";
        }
        
        $query .= "WHERE user_id = :userId and user_info_id=:userInfoId";
        
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(":userId",$userId);
        $stmt->bindParam(":userInfoId",$userInfoId);
        if(!empty($company)){
            $stmt->bindParam(":company",$company);
        }
        if(!empty($firstName)){
            $stmt->bindParam(":firstName",$firstName);
        }
        if(!empty($lastName)){
            $stmt->bindParam(":lastName",$lastName);
        }
        if(!empty($email)){
            $stmt->bindParam(":email",$email);
        }
        if(!empty($phone)){
            $stmt->bindParam(":phone",$phone);
        }
        if(!empty($phone2)){
            $stmt->bindParam(":phone2",$phone2);
        }
        if(!empty($address)){
            $stmt->bindParam(":address",$address);
        }
        if(!empty($city)){
            $stmt->bindParam(":city",$city);
        }
        if(!empty($zip)){
            $stmt->bindParam(":zip",$zip);
        }
        if(!empty($extraField1)){
            $stmt->bindParam(":extraField1",$extraField1);
        }
        if(!empty($extraField2)){
            $stmt->bindParam(":extraField2",$extraField2);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateUserData($userId,$name = NULL, $username=NULL, $email=NULL, $password=NULL)
    {
        $query = "UPDATE jos_users SET";
        $a = 1;
        $pasHash =  shop::getPasswordHash($password);
        shop::verifyPassword($password,$pasHash);
        if(!empty($name)){
            $a++;
            $query .= "`name`=:name ";
        }
        if(!empty($username)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`username`=:username ";
        }
        if(!empty($email)){
            if($a>=2){ $query .= " , ";}
            $a++;
            $query .= "`email`=:email ";
        }
        if(!empty($password)){
            if($a>=2){ $query .= " , ";}
            $a++;
            echo $password. ' - '. $pass;
        }
        $query .= "WHERE id = :userId ";
        
        $stmt = $this->dbGf->prepare($query);
        $stmt->bindParam(":userId",$userId);
        if(!empty($name)){
            $stmt->bindParam(":name",$name);
        }
        if(!empty($username)){
            $stmt->bindParam(":username",$username);
        }
        if(!empty($email)){
            $stmt->bindParam(":email",$email);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function updateCategory($categoryId, $categoryName, $categoryDescription = '', $categoryThumbImage='web/images/shop/emptyImageThumb.jpg', $categoryFullImage='web/images/shop/emptyImage.jpg', $categoryPublish = 'Y', $cdate = 'NOW()', $listOrder = '')
    {
        (empty($categoryThumbImage))?$categoryThumbImage='web/images/shop/emptyImageThumb.jpg':'';
        (empty($categoryFullImage))?$categoryFullImage='web/images/shop/emptyImage.jpg':'';
        (empty($cdate))?$cdate='NOW()':'';
        $stmt = $this->dbGf->prepare("UPDATE `jos_vm_category` 
        SET `category_name`=:categoryName,
        `category_description`=:categoryDescription,
        `category_thumb_image`=:categoryThumbImage,
        `category_full_image`=:categoryFullImage,
        `category_publish`=:categoryPublish,
        `cdate`=:cdate,
        `list_order`=:listOrder 
        WHERE category_id = :categoryId");
        $stmt->bindParam(":categoryId",$categoryId);
        $stmt->bindParam(":categoryName",$categoryName);
        $stmt->bindParam(":categoryDescription",$categoryDescription);
        $stmt->bindParam(":categoryThumbImage",$categoryThumbImage);
        $stmt->bindParam(":categoryFullImage",$categoryFullImage);
        $stmt->bindParam(":categoryPublish",$categoryPublish);
        $stmt->bindParam(":cdate",$cdate);
        $stmt->bindParam(":listOrder",$listOrder);
        
        return $stmt->execute();
    }
    
    public function updateOrderPaymentMethod($orderId, $paymentMethodId)
    {
        $stmt = $this->dbGf->prepare("UPDATE jos_vm_order_payment SET payment_method_id = :paymentMethodId WHERE order_id = :orderId");
        $stmt->bindParam(':paymentMethodId',$paymentMethodId);
        $stmt->bindParam(':orderId',$orderId);
        
        return $stmt->execute();
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
    
    public function deleteDivideOrder($orderId, $konsultantId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `dividedOrders` WHERE orderIdDi = :orderId and konsultantIdDi = :konsultantId");
        $stmt->bindParam(':orderId',$orderId);
        $stmt->bindParam(':konsultantId',$konsultantId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0 ){
            $in = true;
        }else {
            $in = false;
        }
        return $in;
        
    }
    
    public function deleteOrder($orderId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `jos_vm_orders` WHERE `order_id`=:orderId");
        $stmt->bindParam(":orderId",$orderId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function deleteUser($userId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `jos_users` WHERE `id`=:userId");
        $stmt->bindParam(":userId",$userId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $del = shop::deleteAllUserInfo($userId);
            ($del == true )?$in = true: $in = false;
        }else {
            $in = false;
        }
        
        return $in;
    }
    private function deleteAllUserInfo($userId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `jos_vm_user_info` WHERE user_id = :userId");
        $stmt->bindParam(':userId',$userId);
        $stmt->execute();
        $count = $stmt->rowCount();
        ($count == 1)?$in=true:$in=false;
        
        return $in;
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
    
    public function deleteUserInfo($userInfoId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM jos_vm_user_info WHERE user_info_id = :userInfoId");
        $stmt->bindParam(":userInfoId",$userInfoId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }    
    
    private function deleteOrderUserInfo($orderId, $addressType='ST')
    {
        $stmt = $this->dbGf->prepare("DELETE FROM jos_vm_order_user_info WHERE order_id = :orderId and address_type = :addressType");
        $stmt->bindParam(":orderId",$orderId);
        $stmt->bindParam(":addressType",$addressType);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    public function deleteCategory($categoryId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM jos_vm_category WHERE category_id = :categoryId");
        $stmt->bindParam(":categoryId",$categoryId);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            $in = true;
        }else {
            $in = false;
        }
        
        return $in;
    }
    
    private function getPasswordHash($password)
    {
        $newPassword = password_hash($password,PASSWORD_DEFAULT);
        
        return $newPassword;
    }
    
    private function verifyPassword($newPassword,$oldPassword)
    {
        $result = password_verify($newPassword,$oldPassword);
        
        return $result;
    }
    
}
?>