<?php
session_start();

require 'controller/controller.php';

$controller = new Controller();

if(!empty($_GET)){
    extract($_GET);

    if(isset($action)){
        switch($action){
            case 'accueil':
                require 'view/accueil.php';
                break;
            case 'connexion':
                require 'view/connexion.php';
                break;
            case 'inscription':
                require 'view/inscription.php';
                break;
            case 'gestion':
                $controller->affichage();
                break;
            case 'inscrire':
                $controller->inscription($_POST);
                break;
            case 'modifier':
                $controller->modification($id, $_POST);
                break;
            case 'supprimer':
                $controller->suppression($id);
                break;
            default:
                require 'view/error404.php';
                break;
        }
    }else{
        require 'view/error404.php';
    }
}else{
    require 'view/accueil.php';
}

