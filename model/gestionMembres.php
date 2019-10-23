<?php

class GestionMembres{

    function connexion(){
        try{
            $pdo = new PDO("mysql:host=localhost; dbname=stage_1; charset=utf8", 'root', '');
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(Exception $e){
            echo 'Echec de la connexion:'.$e->getMessage();
        }
    }

    function gestionInscription(Membre $membre){
        $pdo = $this->connexion();
        $requete = "INSERT INTO membres (pseudo , email, password, image) VALUES ( :pseudo, :email, :password, :image)";
        $insert = $pdo->prepare($requete);
        $insert->execute(['pseudo'=>$membre->getPseudo(),
                        'email'=>$membre->getEmail(),
                        'password'=>$membre->getPassword(),
                        'image'=>$membre->getImage()]);
    }

    function gestionAffichage(){
        $pdo = $this->connexion();
        $requete = "SELECT * FROM membres";
        $affichage = $pdo->prepare($requete);
        $affichage->execute();
        return $affichage;
    }

    function gestionSuppression($id){
        $pdo = $this->connexion();
        $requete = "DELETE FROM membres WHERE id=$id";
        $supprimer = $pdo->prepare($requete);
        $supprimer->execute();
    }

    function gestionModification(Membre $membre){
        $pdo = $this->connexion();
        $id = $membre->getId();
        $requete = "UPDATE membres SET pseudo = :pseudo, email = :email, password= :password, image = :image WHERE id=$id";
        $modifier = $pdo->prepare($requete);
        $modifier->execute(['pseudo'=>$membre->getPseudo(),
                            'email'=>$membre->getEmail(),
                            'password'=>$membre->getPassword(),
                            'image'=>$membre->getImage()]);
    }

    function getMembreImage($id){
        $pdo = $this->connexion();
        $requete = "SELECT image FROM membres WHERE id=$id"; 
        $image = $pdo->prepare($requete);
        $image->execute();
        $image = $image->fetch();
        return $image['image'];
    }
}

