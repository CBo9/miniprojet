<?php
$titre= 'Inscription';
ob_start();
?>


    <form action="index.php?action=inscrire" method="post">
        <div class="container">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Entrez votre pseudo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Entrez votre mot de passe">
        <span onclick="showPassword('mdp')" id="visible">afficher mot de passe</span>
        <br><br>
        <input type="submit" name="inscription" value="inscription" class="btn btn-secondary">
        </div>
    </form>














<?php 
$content= ob_get_clean(); 
require 'template.php';
?>
