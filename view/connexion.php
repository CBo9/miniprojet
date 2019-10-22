<?php 
$titre='Connexion';

ob_start();?>
<h1>Se connecter</h1>
<div class="container">
	<form method="post">
		<label for="pseudp">Pseudo</label>
		<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
		<br>
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password" placeholder="Mot de passe">
		<br>
		<input type="submit" value="Se connecter">
	</form>
</div>
<?php
$content = ob_get_clean();
require'template.php';