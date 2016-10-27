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
        $stmt=$this->dbGf->prepare("SELECT COUNT(*) as `count` FROM jos_users WHERE username = :username and password = :password");
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
        $stmt = $this->dbGf->prepare("SELECT password FROM jos_users WHERE username = :username");
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    private function getHashedPasswordJoomla($cryptedPass,$salt)
    {
        $pass = md5($cryptedPass.$salt);
        $pass = $pass.':'.$salt;
        
        return $pass;
    }
    
}
?>