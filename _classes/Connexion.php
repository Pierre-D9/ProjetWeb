<?php
/**
 * Description of Connexion
 */
class Connexion {
    
    private $dbh;   // Chaine de connexion
    
    /**
     * Connexion persistante au serveur
     * @return \PDO Connexion
     */    
    public function __construct(){
        // Définition des variables de connexion
        $user = "admin";
        $pass = "minda";
        $dsn ='mysql:host=localhost;dbname=projetweb'; //Data Source Name

        // Connexion 
        try {
            $this->dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT=>true,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  // Connexion persistante            
        }
        catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }        
    }
    /** afficherErreurSQL : 
     *  Affichage de messages lors l'accès à la bdd avec une requete SQL
     *  @param $message	: message a afficher
    */		
    public function afficherErreurSQL($message, $sql="") {
        echo $message . "<br />" . $sql . "<br />"; 
        $info = $this->dbh->errorInfo();
        echo "Code erreur : " . $info[0] . ", Message : " . $info[2];      
        die();
    }

    /**
     * @return PDO
     */
    public function getDbh(): PDO
    {
        return $this->dbh;
    }
}
