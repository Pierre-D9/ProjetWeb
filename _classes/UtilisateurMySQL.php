<?php


class UtilisateurMySQL
{
    private $laConnexion;

    function __construct()
    {
        $this->laConnexion = new Connexion();
    }

    function ajouterUnUtilisateur($pseudo ,$password ,$nom, $prenom, $mail)
    {
        $isInserted = "false";
        $stmt = $this->laConnexion->getDbh()->prepare("INSERT INTO `Utilisateur` (`pseudo`, `password` ,`nom`,`prenom`, `mail`, `typeUtil`)
                                                            VALUES (:pseudo ,:password ,:nom , :prenom , :mail , 0 )");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $password);
        $stmt ->bindParam(':nom', $nom);
        $stmt ->bindParam(':prenom', $prenom);
        $stmt ->bindParam(':mail', $mail);
        if ($stmt ->execute() == 1) {
            $isInserted = "true";
        }
        return $isInserted;

    }

    function supprimerUnUtilisateur($pseudo )
    {
        $isDeleted = false;
        $dernierId =0 ;
        $stmt = $this->laConnexion->getDbh()->prepare("DELETE FROM Utilisateur WHERE pseudo = :pseudo");

        $stmt->bindParam(':pseudo', $pseudo);

        if ($stmt ->execute()) {
            $isDeleted = true;
            $dernierId = $this->laConnexion->getDbh();
        }
        return $dernierId;

    }

    function voirLesUtilisateurs()
    {
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT pseudo, password, nom, prenom, mail FROM Utilisateur WHERE typeUtil = 0 ORDER BY nom ASC;");

        $stmt->execute();


        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche d'utilisateur", $stmt);
        }
        return $stmt;
    }

    function ModifierUtilisateur($nom, $prenom, $mail)
    {
        $Modified = false;
        $dernierId=0;
        $stmt = $this->laConnexion->getDbh()->prepare("UPDATE Utilisateur SET 
                                                nom = :nom, 
                                                prenom = :prenom,  
                                                mail = :mail  
                                                WHERE pseudo = :pseudo");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);

        if($stmt->execute()) {
            echo "edité";
            $dernierId = $this->laConnexion->getDbh();
        }
        return $dernierId;
    }

    function AfficherUnUtilisateur($pseudo)
    {
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT pseudo ,nom, prenom, mail " .
            " FROM Utilisateur " .
            " WHERE pseudo = :pseudo;");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        if ($stmt === false) {
            $this->laConnexion->afficherErreurSQL("Utilisateur non trouvé ", $stmt);
        }
        return $stmt;

    }

    function verifierUtilisateur($pseudo, $password){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT typeUtil, nom, prenom" .
            " FROM Utilisateur".
            " WHERE pseudo = :pseudo".
            " AND password = :password");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        if ($stmt === false) {
            $this->laConnexion->afficherErreurSQL("Utilisateur non trouvé ", $stmt);
        }
        return $stmt;
    }





};
