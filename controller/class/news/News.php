<?php

namespace News;



class News {
    
    public function getNews()
    {
        $stmt =$this->dbInfo->prepare("SELECT id, title, text, published FROM news");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    
}