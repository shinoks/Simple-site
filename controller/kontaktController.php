<?php
require_once('classes/class.Db.php');
    
    
class kontaktController 
{
    protected $db;
    
    function __construct()
    {
        $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("./view"),
            array( "cache" => "./view/cache" ),$loader, array(
    'debug' => true ));
        $this->twig->addExtension(new Twig_Extension_Debug());
        $this->db = dbConn::getConnection();
    }
    
    
    public function getkontaktSite()
    {
        $user = $this->getLoggedUser();
        $oddzial = $this->getOddzialById($user['oddzial']);
        //var_dump($user);
        return $this->twig->render("kontakt.html.twig", array(
                'oddzial'=>$oddzial,
                'szkId'=>$_GET['szkId'],
                'menu'=>$_GET['site']
                ));
    }
    
    private function getOddzialById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM plat_oddzial WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    
    private function getLoggedUser()
    {
        $stmt = $this->db->prepare("SELECT * FROM plat_user WHERE `login`=:sess ");
        $stmt->bindParam(':sess', $_SESSION['user']);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }
    
    
    
}