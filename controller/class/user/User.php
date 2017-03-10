<?php

namespace User;


use Config\Config;

class User {
    
    public function getUserLoggedByUsername($username)
    {
        $stmt=$this->dbGf->prepare("SELECT id, name, username, email, gid FROM jos_users WHERE username = :username");
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function getKonsultant($firstName,$lastName,$password,$konsultantNumber)
    {
        $stmt = $this->dbGf->prepare("SELECT `konsultantPassword` FROM konsultanci 
        WHERE konsultantFirstName = :konsultantFirstName and 
        konsultantLastName = :konsultantLastName and 
        konsultantId = :konsultantNumber and block = 0");
        $stmt->bindParam(':konsultantFirstName',$firstName);
        $stmt->bindParam(':konsultantLastName',$lastName);
        $stmt->bindParam(':konsultantNumber',$konsultantNumber, $this->dbGf->PARAM_INT);
        $stmt->execute();
        $kons = $stmt->fetch();
        
        if (empty($kons)){
            return false;
        } else {
            return password_verify($password,$kons['konsultantPassword']);
        }
    }
    
    private function getKonsultantDetail($konsultantNumber)
    {
        $stmt = $this->dbGf->prepare("SELECT `konsultantPassword`,`konsultantFirstName`, `konsultantLastName`, `konsultantId` FROM konsultanci 
        WHERE konsultantId = :konsultantNumber");
        $stmt->bindParam(':konsultantNumber',$konsultantNumber, $this->dbGf->PARAM_INT);
        $stmt->execute();
        $kons = $stmt->fetch();
        
        return $kons;
    }
    
    public function setKonsultantSession($firstName, $lastName, $konsultantNumber)
    {   
        $kons = user::getKonsultantDetail($konsultantNumber);
        $_SESSION['fN']= $firstName;
        $_SESSION['lN']= $lastName;
        $_SESSION['kN']= $konsultantNumber;
        $_SESSION['hP']= $kons['konsultantPassword'];
        $_SESSION['sT']= time()+36000;
        
    }
    public function logoutKonsultant()
    {
        session_destroy();
    }
    
    public function getAdmins()
    {
        $stmt = $this->dbGf->prepare("SELECT id,name, username, gid, email, registerDate, block FROM jos_users WHERE gid > 18");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getKonsultanci()
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate, block, visible FROM konsultanci WHERE visible = 1");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getKonsultanciForRaports($date)
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate, block, visible FROM konsultanci WHERE visibleDate > :date OR visible = 1");
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getKonsultanciAll()
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate, block, visible, visibleDate FROM konsultanci");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getKonsultantById($konsultantId)
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate, visible FROM konsultanci WHERE konsultantId = :konsultantId");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
        public function getKonsultantLog()
    {
        $stmt = $this->dbGf->prepare("SELECT `konsultantId` FROM konsultanci 
        WHERE konsultantFirstName = :konsultantFirstName and 
        konsultantLastName = :konsultantLastName and 
        konsultantId = :konsultantNumber and 
        konsultantPassword = :konsultantPassword");
        $stmt->bindParam(':konsultantFirstName',$_SESSION['fN']);
        $stmt->bindParam(':konsultantLastName',$_SESSION['lN']);
        $stmt->bindParam(':konsultantPassword',$_SESSION['hP']);
        $stmt->bindParam(':konsultantNumber',$_SESSION['kN'], $this->dbGf->PARAM_INT);
        $stmt->execute();
        $ile = $stmt->rowCount();
        
        return $ile;
    }
    
    
    
    public function addKonsultant($firstName, $lastName, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->dbGf->prepare(" INSERT INTO `konsultanci`(`konsultantFirstName`, `konsultantLastName`, `konsultantPassword`, `konsultantLoginDate`)
        VALUES (:firstName,:lastName,:password,:loginDate)");
        $stmt->bindParam(':firstName',$firstName);
        $stmt->bindParam(':lastName',$lastName);
        $stmt->bindParam(':password',$passwordHash);
        $stmt->bindParam(':loginDate',date('Y-m-d H:i:s'));

        return $stmt->execute();
    }
    
    public function updateKonsultantPassword($konsultantId, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->dbGf->prepare(" UPDATE konsultanci SET konsultantPassword = :password WHERE konsultantId = :konsultantId ");
        $stmt->bindParam(':password',$passwordHash);
        $stmt->bindParam(':konsultantId',$konsultantId);
        
        return $stmt->execute();
    }
    
    public function updateKonsultantVisible($konsultantId, $visible)
    {
        $date = date('Y-m-d H:i:s');
        $stmt = $this->dbGf->prepare("UPDATE konsultanci SET visible = :visible, visibleDate = :date WHERE konsultantId = :konsultantId");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->bindParam(":visible",$visible);
        $stmt->bindParam(":date",$date);
        
        return $stmt->execute();
    }
    
    public function updateKonsultant($firstName, $lastName, $konsultantId)
    {
        $stmt = $this->dbGf->prepare("UPDATE konsultanci SET konsultantFirstName = :konsultantFirstName, konsultantLastName = :konsultantLastName WHERE konsultantId = :konsultantId");
        $stmt->bindParam(":konsultantFirstName",$firstName);
        $stmt->bindParam(":konsultantLastName",$lastName);
        $stmt->bindParam(":konsultantId",$konsultantId);
        
        return $stmt->execute();
    }
    
    public function updateKonsultantBlock($konsultantId,$block)
    {   if($block==2){
            $block = '0';
        }
        $stmt = $this->dbGf->prepare("UPDATE konsultanci SET block = :block WHERE konsultantId = :konsultantId");
        $stmt->bindParam("block",$block);
        $stmt->bindParam("konsultantId",$konsultantId);
        
        return $stmt->execute();
    }
    
    public function updateAdminBlock($adminId,$block)
    {   if($block==2){
            $block = '0';
        }
        $stmt = $this->dbGf->prepare("UPDATE jos_users SET block = :block WHERE id = :adminId");
        $stmt->bindParam("block",$block);
        $stmt->bindParam("adminId",$adminId);
        
        return $stmt->execute();
    }
    
    public function deleteKonsultant($konsultantId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `konsultanci` WHERE konsultantId = :konsultantId ");
        $stmt->bindParam(":konsultantId",$konsultantId);
        $stmt->execute();
        ($stmt->rowCount()>0)?$in= true:$in= false;
        
        return $in;
    }
    public function deleteAdmin($adminId)
    {
        $stmt = $this->dbGf->prepare("DELETE FROM `jos_users` WHERE id = :adminId ");
        $stmt->bindParam(":adminId",$adminId);
        $stmt->execute();
        ($stmt->rowCount()>0)?$in= true:$in= false;
        
        return $in;
    }
}
?>