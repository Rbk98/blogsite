<?php
ob_start();
?>

<div>
  <?php if (isset($_SESSION['id'])){ ?>
<div class="shadow-lg rounded" style="margin:8%;">
    <form name="ModifCommentaire" action="?page=commentaire&action=update&id=<?= $_GET['id']; ?>" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">

            <p style="margin:2%;"><?php echo $_SESSION['username'];?> :</p>
            <input type="text" style="margin:2%;" name="content" class="form-control" value="">
            <div style="margin:2%;">
                <button class="btn btn-outline-primary" type="submit" id="modifCommentaire">Modifier mon commentaire</button>
            </div>
        </div>
    </form>
</div>
<?php }?> 
</div>

<?php
$body = ob_get_clean();

require('templates/template.php');
?>