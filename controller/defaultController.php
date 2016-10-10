<?php
require_once('config/class.Db.php');
    
    
class DefaultController 
{
    protected $db;
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
            array( "cache" => "./view/cache" ) );
            
        $this->db = dbConn::getConnection();
    }
    
    
    public function addSessionTime()
    {
        $_SESSION['czas_sesji'] = time() + 60 * 60;
    }
    
    public function checkLoggedUser()
    {
        $status = 0;
        if($_SESSION['auth'] == TRUE)
        {
            $status = 1; 
            if($_SESSION['czas_sesji'] > time())
            {
                $this->addSessionTime();
            } else {
                $this->logoutUser();
                $status = 0;
            }
        } else {
            $this->logoutUser();
        }
        
        return $status;
    }
    
    public function logoutUser()
    {
        //session_destroy();
        unset($_SESSION["auth"]);
        unset($_SESSION["czas_sesji"]);
        unset($_SESSION["user"]);
    }
    
    public function redirect($info = NULL)
    {
        header("Location: http://grupaformat.pl/index.php?log=out&info=".$info);
        die();
    }
    
    
    public function getStatusSzkolenia($nrszkolenia)
    {
        $stmt = $this->db->prepare("SELECT plat_user_szkolenia.status, plat_user_szkolenia.id_szk
FROM plat_user_szkolenia 
LEFT JOIN plat_user on plat_user.user_id = plat_user_szkolenia.user_id 
LEFT JOIN plat_szkolenia ON plat_user_szkolenia.id_szkolenia=plat_szkolenia.id_szkolenia 
INNER JOIN plat_szkolenia_status ON plat_szkolenia_status.id_statusu = plat_user_szkolenia.status 
WHERE plat_user.login = :sess
and plat_user_szkolenia.id_szkolenia= :nrszkolenia;");
        $stmt->bindParam(':sess', $_SESSION['user']);
        $stmt->bindParam(':nrszkolenia', $nrszkolenia);
        $stmt->execute();
        $row = $stmt->fetch();
        $status = $row['status'];
        
        return $status;
    }
        
    function getLoggedUser()
    {
        $stmt = $this->db->prepare("SELECT * FROM plat_user WHERE `login`=:sess ");
        $stmt->bindParam(':sess', $_SESSION['user']);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }
   
    public function checkSzkId($user_id,$szkId)
    {
        $stmt = $this->db->prepare("SELECT * FROM plat_user_szkolenia WHERE user_id = :user_id and id_szk = :szkId");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':szkId',$szkId);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
   
}