
<?php ob_start(); ?>
<div class="container_section">

<div class="shadow-lg rounded" style="margin:8%;">
    <form name="AjoutCommentaire" action="?page=commentaire&action=create" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <p style="margin:2%;"><?php echo $_SESSION['username'];?> :</p>
            <input type="text" style="margin:2%;" name="content" class="form-control" placeholder="Ecrire un commentaire...">
            <div style="margin:2%;">
                <button class="btn btn-outline-primary" type="submit" id="envoyerCommentaire">Envoyer le commentaire</button>
            </div>
        </div>
    </form>
</div>

</div>

<?php
$body = ob_get_clean();

require 'templates/template.php';
?>