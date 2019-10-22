<?php
$titre= 'Accueil';
ob_start();
?>


<h1>Page d'Accueil</h1>
<form action="index.php?action=formulaire" method="post" enctype="multipart/form-data">
	<input type="file" name="mfichier" id="imgInp">
	<input type="text" name="prenom">
	<input type="submit">
</form>
<img id="preview" src="#" alt=" " />

<?php 
$content= ob_get_clean(); 
require 'template.php';
?>
