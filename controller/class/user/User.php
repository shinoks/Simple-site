<?php

namespace User;


use Config\Config;

class User {
    
    public function getUserLoggedByUsername($username)
    {
        $stmt=$this->dbGf->prepare("SELECT id, name, username, email FROM jos_users WHERE username = :username");
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    
}
?>