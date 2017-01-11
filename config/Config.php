<?php
namespace Config;


class Config
{

    private function __construct()
    {
        
    }
    
    public function getConfiguration()
    {
        $stmt = $this->db->prepare("SELECT * FROM config");
        $stmt->execute();
        
        return $stmt->fetch();
    } 
    
    function setConfig()
    {
        $config = config::getConfiguration();
        
        $this->carousel = false;
        $this->carouselText = "Prosta strona";
        $this->menuPosition = $config['menuPosition'];
        $this->menuWidth =  $config['menuWidth'];
        $this->containerWidth = "width-900px";
        $this->companyName = $config['companyName'];
        $this->companySlogan = $config['companySlogan'];
        $this->siteBackgroundImage = $config['siteBackgroundImage'];
        ($config['footer']==1) ? $this->footer = true : $this->footer = false;
        $this->footerText = $config['footerText'];
        $this->breadcrumbs = false;
        $this->menuShadow = true;
        $this->articleShadow = true;
        $this->dbPrefix = $config['dbPrefix'];
        $this->pageName = $config['pageName'];
        $this->pageSite = $config['pageSite'];
        $this->siteEmail = $config['siteEmail'];
        $this->email = $config['email'];
        $this->emailPassword = $config['emailPassword'];
    }

    public function getConfig(){

        config::setConfig();
        
        $config = array(
            'menuWidth'=>$this->menuWidth,
            'carousel'=>$this->carousel,
            'carouselText'=>$this->carouselText,
            'menuPosition'=>$this->menuPosition,
            'containerWidth'=>$this->containerWidth,
            'companyName'=>$this->companyName,
            'companySlogan'=>$this->companySlogan,
            'footer'=>$this->footer,
            'footerText'=>$this->footerText,
            'breadcrumbs'=>$this->breadcrumbs,
            'menuShadow'=>$this->menuShadow,
            'articleShadow'=>$this->articleShadow,
            'dbPrefix'=>$this->dbPrefix,
            'pageName'=>$this->pageName,
            'pageSite'=>$this->pageSite,
            'email'=>$this->email,
            'siteEmail'=>$this->siteEmail,
            'emailPassword'=>$this->emailPassword,
            'upsUserId'=>'grupaformat',
            'upsAccount'=>'E96629',
            'upsPassword'=>'stefan100%',
            'upsAccessKey'=>'9D1D266E73546938',
            'customerPassword'=>'nmnmnm'
        );

        return $config;
    }
    
    public function getDbPrefix()
    {
        return $this->dbPrefix;
    }
    
    public function saveConfig()
    {
        (isset($_POST['pageName'])) ? $this->pageName = $_POST['pageName']:$this->pageName;
        (isset($_POST['companyName'])) ? $this->companyName = $_POST['companyName']:$this->companyName;
        (isset($_POST['companySlogan'])) ? $this->companySlogan = $_POST['companySlogan']:$this->companySlogan;
        (isset($_POST['siteBackgroundImage'])) ? $this->siteBackgroundImage = $_POST['siteBackgroundImage']:$this->siteBackgroundImage;
        (isset($_POST['footer'])) ? $this->footer = $_POST['footer']:$this->footer;
        (isset($_POST['footerText'])) ? $this->footerText = $_POST['footerText']:$this->footerText;
        (isset($_POST['dbPrefix'])) ? $this->dbPrefix = $_POST['dbPrefix']:$this->dbPrefix;
        (isset($_POST['menuWidth'])) ? $this->menuWidth = $_POST['menuWidth']:$this->menuWidth;
        (isset($_POST['menuPosition'])) ? $this->menuPosition = $_POST['menuPosition']:$this->menuPosition;
        (isset($_POST['pageSite'])) ? $this->pageSite = $_POST['pageSite']:$this->pageSite;
        
        $stmt = $this->db->prepare("UPDATE `config` SET `pageName`=:pageName,`companyName`=:companyName,`companySlogan`=:companySlogan,`siteBackgroundImage`=:siteBackgroundImage,`footer`=:footer,`footerText`=:footerText,`dbPrefix`=:dbPrefix,`menuWidth`=:menuWidth,`menuPosition`=:menuPosition,`pageSite`=:pageSite");
        $stmt->bindParam(':pageName',$this->pageName);
        $stmt->bindParam(':companyName',$this->companyName);
        $stmt->bindParam(':companySlogan',$this->companySlogan);
        $stmt->bindParam(':siteBackgroundImage',$this->siteBackgroundImage);
        $stmt->bindParam(':footer',$this->footer);
        $stmt->bindParam(':footerText',$this->footerText);
        $stmt->bindParam(':dbPrefix',$this->dbPrefix);
        $stmt->bindParam(':menuWidth',$this->menuWidth);
        $stmt->bindParam(':menuPosition',$this->menuPosition);
        $stmt->bindParam(':pageSite',$this->pageSite);
        $stmt->execute();
        
        
        return $stmt->rowCount();
    }
    
    
    
}
?>