<?php
require 'model/gestionMembres.php';
require 'class/membre.php';


class Controller{

    function inscription(array $donnees){
        $gestion = new GestionMembres();
        $membre = new Membre($donnees);
        $gestion->gestionInscription($membre);
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

    function formulaire(array $donnees, array $files){
        $gestion = new GestionMembres();
        if (isset($_FILES['mfichier']) AND $_FILES['mfichier']['error'] == 0)  {

        // LE FICHIER NE DOIT PAS EXEDER 1Mo
        if ($_FILES['mfichier']['size'] <= 1000000) {

            // EXTENSION AUTORISEES
            $extension_autorisees = ["jpg", "jpeg", "png", "gif"];
            $info= pathinfo($_FILES['mfichier']['name']);
            
            // EXTENSION DE NOTRE FICHIER
            $extension_uploadee = $info['extension'];
            
            // ON VERIFIE L'EXTENSION
            if (in_array($extension_uploadee, $extension_autorisees)) {

                $date = date('m_d_Y_h_i_s', time());
                move_uploaded_file($_FILES['mfichier']['tmp_name'], 'public/img/'. $date.basename($_FILES['mfichier']['name']));
                // DECLARATION DE LA VARIABLE IMAGE
                $image = $date . basename($_FILES['mfichier']['name']) ;
                $donnees['image'] = $image;
                $gestion->formulaire($donnees);
                }
            }
        }
        header('location: index.php');   

    }

}