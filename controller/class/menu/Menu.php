<?php

namespace Menu;


class Menu {
    
    protected $db;
    
    function __construct($db)
    {
        $this->db = $db;
    }

    
    
    public function getMenuItems()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."menu");
        $stmt->execute();
        $menu = $stmt->fetchAll();
        
        return $menu;
    }
    
    public function getMenuItemsWithoutChild()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."menu WHERE parentId = 0");
        $stmt->execute();
        $menu = $stmt->fetchAll();
        
        return $menu;
    }
    
    public function getChildMenuItems()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."menu WHERE parentId > 0");
        $stmt->execute();
        $menu = $stmt->fetchAll();
        
        return $menu;
    }    
    public function getAdminMenuItems()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."adminMenu");
        $stmt->execute();
        $menu = $stmt->fetchAll();
        
        return $menu;
    }
    
    public function getAdminChildMenuItems()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."adminMenu WHERE parentId > 0");
        $stmt->execute();
        $menu = $stmt->fetchAll();
        
        return $menu;
    }
    
    public function getMenuById($menuId)
    {
        $menuId = (int) $menuId;

        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."menu WHERE menuId = :menuId");
        $stmt->bindParam(':menuId', $menuId, $this->db->PARAM_INT);
        $stmt->execute();
        $menu = $stmt->fetch();
        
        return $menu;
    }
    
    public function addUserMenu($menuName,$menuHref,$parentId = 0,$parent = 0,$published = 1,$articleId = NULL)
    {
        $stmt = $this->db->prepare("INSERT INTO ".$this->config['dbPrefix']."menu(`menuName`, `menuHref`, `parentId`, `parent`, `published`, `articleId`) VALUES (:menuName,:menuHref,:parentId,:parent,:published,:articleId)");
        $stmt->bindParam(':menuName',$menuName);
        $stmt->bindParam(':menuHref',$menuHref);
        $stmt->bindParam(':parentId',$parentId);
        $stmt->bindParam(':parent',$parent);
        $stmt->bindParam(':published',$published);
        $stmt->bindParam(':articleId',$articleId);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    public function deleteUserMenu($menuId)
    {
        $stmt = $this->db->prepare("DELETE FROM ".$this->config['dbPrefix']."menu WHERE menuId = :menuId");
        $stmt->bindParam(':menuId',$menuId);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    public function updateUserMenu($menuId,$menuName,$menuHref,$parentId,$parent,$published)
    {
        $stmt = $this->db->prepare("UPDATE ".$this->config['dbPrefix']."menu SET `menuName`=:menuName,`menuHref`=:menuHref,`parentId`=:parentId,`parent`=:parent,`published`=:published WHERE menuId = :menuId");
        $stmt->bindParam(':menuId',$menuId);
        $stmt->bindParam(':menuName',$menuName);
        $stmt->bindParam(':menuHref',$menuHref);
        $stmt->bindParam(':parentId',$parentId);
        $stmt->bindParam(':parent',$parent);
        $stmt->bindParam(':published',$published);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
}
?>