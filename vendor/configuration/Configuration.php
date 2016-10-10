<?php
namespace Configuration;

class Configuration {
    
    
    function __construct()
    {
        
    }

    public function getConfiguration()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."config");
        $stmt->execute();
        
        return $stmt->fetch();
    }  
       
}
?>