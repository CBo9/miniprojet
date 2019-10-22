<?php
$titre= 'Accueil';
ob_start();
?>


<h1>Page d'Accueil</h1>

<?php 
$content= ob_get_clean(); 
require 'template.php';
?>
