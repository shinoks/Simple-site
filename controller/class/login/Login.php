<?php

namespace Login;


use Config\Config;

class Login {
    
    function __construct($db)
    {
        $this->db = $db;
        $this->config = config::getConfig();
        
    }
    
    public function login($username, $password)
    {
        $stmt=$this->db->prepare("SELECT COUNT(*) as `count` FROM ".$this->config['dbPrefix']."users WHERE username = :username and password = :password");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $select = $stmt->fetch();
        
        if($select['count'] == 1){
            login::sess($username);
            return true;
        } else {
            return false;
        }
    }
    
    private function sess($username)
    {
        $_SESSION['user']= $username;
        login::renewSessionTime();
        $_SESSION['auth'] = true;
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
        unset($_SESSION['session_time']);
        
        return true;
        
    }
    
    public function checkSession()
    {
        $info = array();
        if(isset($_SESSION['user']) && isset($_SESSION['auth']) && $_SESSION['auth']== true && login::checkSessionTime()>0){
            login::renewSessionTime();
            $info['session'] = true;
            $info['info'] = 'logged';
            $info['sessionTime'] = $this->sessionTime;
            
            return $info;
            
        }else {
            $info['session'] = false;
            $a = 0;
            if(!isset($_SESSION['user'])){
                $info['info'] = 'session-user-lack';
                $a ++;
            }
            if(!isset($_SESSION['auth'])){
                $info['info'] = 'session-auth-lack';
                $a ++;
            }
            if(login::checkSessionTime()<=0){
                $info['info'] = 'session-timeout';
                $a ++;
            }
            ($a == 3)?$info['info'] = 'session-notLogged': '';
            $info['sessionTime'] = $this->sessionTime;
            
            login::logout();
            
            return $info;
        }
    }
    
    public function renewSessionTime()
    {
        $_SESSION['sessionTime'] = time()+3600; 
    }
    
    public function checkSessionTime()
    {
        $czas = $_SESSION['sessionTime'] - time();
        
        return $czas;
    }
    
    public function loginJoomla($username, $password)
    {
        $user = login::getUserByUsername($username);
        $parts= explode( ':', $user['password'] );
        $salt= $parts[1];
        $hashedPassword = login::getHashedPasswordJoomla($password,$salt);
        $stmt=$this->dbGf->prepare("SELECT COUNT(*) as `count` FROM jos_users WHERE username = :username and password = :password and block = 0 and gid=18");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$hashedPassword);
        $stmt->execute();
        $select = $stmt->fetch();
        
        if($select['count'] == 1){
            login::sess($username);
            
            return true;
        } else {
            login::logout();
            return false;
        }
    }
    
    public function loginJoomlaAdministrator($username, $password)
    {
        $user = login::getUserByUsername($username);
        $parts= explode( ':', $user['password'] );
        $salt= $parts[1];
        $hashedPassword = login::getHashedPasswordJoomla($password,$salt);
        $stmt=$this->dbGf->prepare("SELECT COUNT(*) as `count` FROM jos_users WHERE username = :username and password = :password and gid<>18 and block = 0");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$hashedPassword);
        $stmt->execute();
        $select = $stmt->fetch();
        
        if($select['count'] == 1){
            login::sess($username);
            
            return true;
        } else {
            login::logout();
            return false;
        }
    }
    
    public function getUserByUsername($username)
    { 
        $stmt = $this->dbGf->prepare("SELECT password,gid,usertype,block FROM jos_users WHERE username = :username");
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function addNewJoomlaUser($name,$username,$email,$password,$usertype="Registered",$block=0, $sendEmail=1, $gid=18, $activation="", $params = "")
    {
        $salt = login::genRandomSalt();
        $pass = login::getHashedPasswordJoomla($password,$salt);
        
        $stmt = $this->dbGf->prepare("INSERT INTO `jos_users`
        (`name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, 
        `gid`, `registerDate`, `activation`, `params`) 
        VALUES 
        (:name,:username,:email,:password,:usertype,:block,:sendEmail,
        :gid,:registerDate,:activation,:params)");
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$pass);
        $stmt->bindParam(':usertype',$usertype);
        $stmt->bindParam(':block',$block);
        $stmt->bindParam(':sendEmail',$sendEmail);
        $stmt->bindParam(':gid',$gid);
        $stmt->bindParam(':registerDate',date("Y-m-d H:i:s", time()));
        $stmt->bindParam(':activation',$activation);
        $stmt->bindParam(':params',$params);
        $stmt->execute();
        
        return $this->dbGf->lastInsertId();
    }
    
    private function getHashedPasswordJoomla($cryptedPass,$salt)
    {
        $pass = md5($cryptedPass.$salt);
        $pass = $pass.':'.$salt;
        
        return $pass;
    }
    
    private function genRandomSalt($length = 32)
    {
        $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $len = strlen($salt);
        $makepass = '';

        $stat = @stat(__FILE__);
        if(empty($stat) || !is_array($stat)) $stat = array(php_uname());

        mt_srand(crc32(microtime() . implode('|', $stat)));

        for ($i = 0; $i < $length; $i ++) {
            $makepass .= $salt[mt_rand(0, $len -1)];
        }

        return $makepass;
    }
    
}
?>