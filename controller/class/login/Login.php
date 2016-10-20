<?php

namespace Login;


use Config\Config;

class Login {
    
    
    function __construct($db)
    {
        $this->db = $db;
        $this->config = config::getConfig();
        $this->sessionTime = 3600;
    }

    
    public function login($username, $password)
    {
        $stmt=$this->db->prepare("SELECT COUNT(*) as `count` FROM ".$this->config['dbPrefix']."users WHERE username = :username and password = :password");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $select = $stmt->fetch();
        
        if($select['count'] == 1){
            $this->sess($username);
            return true;
        } else {
            return false;
        }
    }
    
    public function sess($username)
    {
        $_SESSION['user']= $username;
        $_SESSION['session_time']= $this->renewSessionTime();
        $_SESSION['auth'] = true;
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
        unset($_SESSION['session_time']);
        
    }
    
    public function checkSession()
    {
        $info = array();
        if(isset($_SESSION['user']) && isset($_SESSION['auth']) && $_SESSION['auth']== true && $this->checkSessionTime()>0){
            login::renewSessionTime();
            $info['session'] = true;
            $info['info'] = 'logged';
            $info['sessionTime'] = $this->sessionTime;
            
            return $info;
            
        }else {
            $info['session'] = false;
            if(!isset($_SESSION['user'])){
                $info['info'] = 'session-user-lack';
            }
            if(!isset($_SESSION['auth'])){
                $info['info'] = 'session-auth-lack';
            }
            if($this->checkSessionTime()<=0){
                $info['info'] = 'session-timeout';
            }
            $info['sessionTime'] = $this->sessionTime;
            
            return $info;
        }
    }
    
    public function renewSessionTime()
    {
        $_SESSION['sessionTime'] = time()+$this->sessionTime; 
    }
    
    public function checkSessionTime()
    {
        $czas = $_SESSION['sessionTime'] - time();
        
        return $czas;
    }
    

}
?>