<?php
$titre= 'Inscription';
ob_start();
?>


    <form action="index.php?action=inscrire" method="post" enctype="multipart/form-data">
        <div class="container">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Entrez votre pseudo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe">
        <span onclick="showPassword('password')" id="visible">afficher mot de passe</span>
        <input type="file" name="image" id="imgInp" accept=".gif,.png,.jpg" hidden>
        <br><br>
        <label for="imgInp" class="buttonFile">Choisir une image <img id="preview" src="#" alt=" " /></label>
        <br><br>
        <input type="submit" name="inscription" value="inscription" class="btn btn-secondary">
        </div>
    </form>














<?php 
$content= ob_get_clean(); 
require 'template.php';
?>
