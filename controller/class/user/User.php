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
    
    public function getKonsultant($firstName,$lastName,$password,$konsultantNumber)
    {
        $stmt = $this->dbGf->prepare("SELECT `konsultantPassword` FROM konsultanci 
        WHERE konsultantFirstName = :konsultantFirstName and 
        konsultantLastName = :konsultantLastName and 
        konsultantId = :konsultantNumber");
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
    
    public function getKonsultanci()
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate FROM konsultanci");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getKonsultantById($konsultantId)
    {
        $stmt = $this->dbGf->prepare("SELECT konsultantId, konsultantFirstName, konsultantLastName, konsultantLoginDate FROM konsultanci WHERE konsultantId = :konsultantId");
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
    
    public function updateKonsultant($firstName, $lastName, $konsultantId)
    {
        $stmt = $this->dbGf->prepare("UPDATE konsultanci SET konsultantFirstName = :konsultantFirstName, konsultantLastName = :konsultantLastName WHERE konsultantId = :konsultantId");
        $stmt->bindParam("konsultantFirstName",$firstName);
        $stmt->bindParam("konsultantLastName",$lastName);
        $stmt->bindParam("konsultantId",$konsultantId);
        
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
}
?>