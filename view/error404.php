<?php
$titre = 'Erreur 404';

ob_start(); 
?>


<h1>Erreur 404</h1>


<?php 
$content = ob_get_clean();

require 'template.php';
?>