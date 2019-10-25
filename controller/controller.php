<?php
require 'model/gestionMembres.php';
require 'class/membre.php';


class Controller{

    function inscription(){
        $gestion = new GestionMembres();
        $membre = new Membre($_POST);
        $image= 'default.jpg';
        if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)  {
                if ($_FILES['image']['size'] <= 1000000) {
                    $date = date('m_d_Y_h_i_s', time());
                    $image = $date . basename($_FILES['image']['name']) ;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'. $image);
                }
            }
        $membre->setImage($image);
        print_r($membre);
        $gestion->gestionInscription($membre);
        header('location: index.php?action=gestion');
        }
        
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
        $image = $gestion->getMembreImage($id);
        if($image != 'default.jpg'){
            unlink('public/img/' . $image );
        }
        $gestion->gestionSuppression($id);
        header('location: index.php?action=gestion');
    }

    function modification($id){
        $gestion = new GestionMembres();
        $membre = new Membre($_POST);
        $membre->setId($id);
        $image = $gestion->getMembreImage($id);
        if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)  {
            if ($_FILES['image']['size'] <= 1000000) {

                    if($image != 'default.jpg'){
                        unlink('public/img/' . $image );
                    } 
                    $date = date('m_d_Y_h_i_s', time());
                    $image = $date . basename($_FILES['image']['name']) ;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'. $image);
                    
                
            }
        }
        $membre->setImage($image);
        $gestion->gestionModification($membre);
        header('location: index.php?action=gestion');    
    }
}