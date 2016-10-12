<?php
namespace Articles;


use Config\Config;

class Articles {
    
    
    function __construct()
    {
        $this->config = config::getConfig();
        $this->sessionTime = 3600;
    }

    public function getPagination($activePage)
    {
        $limit = articles::getItemsOnSite();
        $start = $activePage * $limit -$limit;
        $end = $start + $limit;
        $articles = articles::getArticlesOnPage($start,$end);
        $pages = articles::getArticlesCount()/$limit;
        $pagin = array('articles'=>$articles, 'pages'=>$pages, 'limit'=>$limit);
        
        return $pagin;
    }
    
    public function getItemsOnSite()
    {
        $itemsOnSite = 4;
        
        return $itemsOnSite;
    }
    
    public function getArticlesOnPage($start, $end)
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."articles LIMIT :start, :end");
        $stmt->bindParam(':start',$start, $this->db->PARAM_INT);
        $stmt->bindParam(':end',$end,$this->db->PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }  
        
    public function getArticlesCount()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM ".$this->config['dbPrefix']."articles");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row[0];
    }
    
    public function getArticles()
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."articles");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getArticlesPublished($published = 1)
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."articles WHERE articlePublished = :published");
        $stmt->bindParam(':published',$published);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getArticle($articleId)
    {
        $stmt = $this->db->prepare("SELECT * FROM ".$this->config['dbPrefix']."articles WHERE articleId = :articleId");
        $stmt->bindParam(':articleId',$articleId);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    public function deleteArticle($articleId)
    {
        $stmt = $this->db->prepare("DELETE FROM ".$this->config['dbPrefix']."articles WHERE articleId = :articleId");
        $stmt->bindParam(':articleId',$articleId);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }
    
    public function showArticle($articleId)
    {
        $stmt = $this->db->prepare("UPDATE ".$this->config['dbPrefix']."articles SET articlePublished = 1 WHERE articleId = :articleId");
        $stmt->bindParam(':articleId',$articleId);
        $stmt->execute();
        
        if($stmt->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }
    
    public function hideArticle($articleId)
    {
        $stmt = $this->db->prepare("UPDATE ".$this->config['dbPrefix']."articles SET articlePublished = 0 WHERE articleId = :articleId");
        $stmt->bindParam(':articleId',$articleId);
        $stmt->execute();
        
        if($stmt->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }
    
    public function addArticle($articleName,$articleText,$articleDate,$articleAuthor,$articlePublished, $articleCategory)
    {
        $articleDate = date('Y-m-d', strtotime($articleDate));
        $stmt = $this->db->prepare("INSERT INTO ".$this->config['dbPrefix']."articles(`articleName`, `articleText`, `articleCategory`, `articleDate`, `articleAuthor`, `articlePublished`) VALUES (:articleName,:articleText,:articleCategory,:articleDate,:articleAuthor,:articlePublished)");
        $stmt->bindParam(':articleName',$articleName);
        $stmt->bindParam(':articleText',$articleText);
        $stmt->bindParam(':articleDate',$articleDate);
        $stmt->bindParam(':articleAuthor',$articleAuthor);
        $stmt->bindParam(':articleCategory',$articleCategory);
        $stmt->bindParam(':articlePublished',$articlePublished);
        $stmt->execute();
        
        if($stmt->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }
    public function updateArticle($articleId,$articleName,$articleText,$articleDate,$articleAuthor,$articlePublished, $articleCategory)
    {
        $articleDate = date('Y-m-d', strtotime($articleDate));
        $stmt = $this->db->prepare("UPDATE ".$this->config['dbPrefix']."articles SET articleName=:articleName, articleText=:articleText, articleCategory=:articleCategory, articleDate=:articleDate, articleAuthor=:articleAuthor, articlePublished = :articlePublished  WHERE articleId = :articleId");
        $stmt->bindParam(':articleId',$articleId);
        $stmt->bindParam(':articleName',$articleName);
        $stmt->bindParam(':articleText',$articleText);
        $stmt->bindParam(':articleDate',$articleDate);
        $stmt->bindParam(':articleAuthor',$articleAuthor);
        $stmt->bindParam(':articleCategory',$articleCategory);
        $stmt->bindParam(':articlePublished',$articlePublished);
        $stmt->execute();
        
        if($stmt->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }
    
    
    
    
}
?>