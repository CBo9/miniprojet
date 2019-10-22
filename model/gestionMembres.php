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

    function gestionInscription(Membre $donnees){
        $pdo = $this->connexion();
        $requete = "INSERT INTO membres (pseudo , email, mdp) VALUES ( :pseudo, :email, :mdp)";
        $insert = $pdo->prepare($requete);
        $insert->execute(['pseudo'=>$donnees->getPseudo(),
                        'email'=>$donnees->getEmail(),
                        'mdp'=>$donnees->getMdp()]);
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
        $requete = "UPDATE membres SET pseudo = :pseudo, email = :email, mdp= :mdp WHERE id=$id";
        $modifier = $pdo->prepare($requete);
        $modifier->execute(['pseudo'=>$membre->getPseudo(),
                            'email'=>$membre->getEmail(),
                            'mdp'=>$membre->getMdp()]);
    }

    function formulaire(array $donnees){
         $pdo = $this->connexion();
         $query = "INSERT INTO form (fichier, prenom) VALUES (:fichier, :prenom)";
         $insertion = $pdo->prepare($query);
         $insertion->execute(['fichier'=>$donnees['image'],
                              'prenom'=>$donnees['prenom']]);
    }
}