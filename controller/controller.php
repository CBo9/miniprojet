<?php
require 'model/gestionMembres.php';
require 'class/membre.php';


class Controller{

    function inscription(array $donnees){
        $gestion = new GestionMembres();
        $membre = new Membre($donnees);
        if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)  {
            if ($_FILES['image']['size'] <= 1000000) {

                $extension_autorisees = ["jpg", "jpeg", "png", "gif"];
                $info = pathinfo($_FILES['image']['name']);       
                $extension_uploadee = $info['extension'];
                
                if (in_array($extension_uploadee, $extension_autorisees)) {

                    $date = date('m_d_Y_h_i_s', time());
                    $image = $date . basename($_FILES['image']['name']) ;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'. $image);
                    
                    $membre->setImage($image);
                    $gestion->gestionInscription($membre);
                }
            }
        }
        
        header('location: index.php?action=gestion');
    }

    function affichage(){
        $gestion = new GestionMembres();
        $affichage = $gestion->gestionAffichage();
        while($dataMembre = $affichage->fetch()){
            $membres[]= new Membre($dataMembre);
        }
        require 'view/gestion.php';
    }

    function suppression($id){
        $gestion = new GestionMembres();
        $gestion->gestionSuppression($id);
        header('location: index.php?action=gestion');
    }

    function modification($id,array $donnees){
        $gestion = new GestionMembres();
        $membre = new Membre($donnees);
        $membre->setId($id);
        $gestion->gestionModification($membre);
        header('location: index.php?action=gestion');    
    }
}