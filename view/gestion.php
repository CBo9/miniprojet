<?php
$titre= 'gestion';
ob_start();
?>

<form id='formModif' method="POST" >
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">pseudo</th>
                <th scope="col">email</th>
                <th scope="col">mot de passe</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($membres as $membre): ?>

            <tr id="infos<?=$membre->getId()?>">
                <td><?=$membre->getId()?></td>
                <td id="pseudo<?=$membre->getId()?>"><?=$membre->getPseudo()?></td>
                <td id="email<?=$membre->getId()?>"><?=$membre->getEmail()?></td>
                <td id="mdp<?=$membre->getId()?>"><?=$membre->getMdp()?></td> 
                <td id="bouton<?=$membre->getId()?>"><span class="btn btn-success boutonModif" onclick="modif(<?=$membre->getId()?>)" value="<?=$membre->getId()?>" >modifier</span></td>    
                <td><span onclick="confirmation(<?=$membre->getId()?>)" class="btn btn-danger" >supprimer</span></td>            
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</form>  
<?php 
$content= ob_get_clean(); 
require 'template.php';
?>
