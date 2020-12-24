<?php
ob_start();
?>

<div class="container_section">
    <fieldset style="margin:6%;">
        <br>
        <h1 style="text-align:center; margin-bottom:2%;"><u>Titre</u> : <?= $postLecture['title']; ?></h1>
        <hr>
        <p> <b><u> Contenu du post </u>: </b></p>
        <hr>
        <p class="text"><?= $postLecture['content']; ?></p>
        <br>
    </fieldset>
    <hr style="border: 10px solid #51B0FF; border-radius: 5px; margin: 10px;"> 
    <div style="margin:2%;">
    <p style="margin-left:6%;"> <b><u> Commentaires</u></b></p><br>
       <?php require_once ('templates/commentaire.php'); ?>
    </div>
    <br>
    <div>
        <button style="margin:2%;" type="button" class="btn btn-outline-primary btn-sm"> <a href="?page=post&action=liste"> Retour </a></button>
    </div>
</div>

<?php

$body = ob_get_clean();

require('template.php');
?>