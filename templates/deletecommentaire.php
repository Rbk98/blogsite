<?php
ob_start();
?>

<div>
  <?php if (isset($_SESSION['id'])){ ?>
    <form name="SupprCommentaire" action="?page=commentaire&action=delete&id=<?= $_GET['id']; ?>" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <div style="float:none; margin-top:5%; margin-left:40%; margin-bottom:5%;">
                <button class="btn btn-outline-primary" type="submit" id="supprCommentaire"> Je souhaite supprimer mon commentaire</button>
            </div>
        </div>
    </form>
<?php }
?> 
</div>

<?php
$body = ob_get_clean();

require('templates/template.php');
?>