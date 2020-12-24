

<div>
  <?php if (isset($_SESSION['id'])){ ?>
<div class="shadow-lg rounded" style="margin:8%;">
    <form name="AjoutCommentaire" action="?page=commentaire&action=update" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idpost" value="<?php echo $postLecture['idpost']; ?>">

            <p style="margin:2%;"><?php echo $_SESSION['username'];?> :</p>
            <input type="text" style="margin:2%;" name="content" class="form-control" value="">
            <div style="margin:2%;">
                <button class="btn btn-outline-primary" type="submit" id="envoyerCommentaire">Modifier mon commentaire</button>
            </div>
        </div>
    </form>
</div>
<?php }
else{
  echo '<p style="text-align:center; margin:2%;"> Veuillez vous <b><a href="?page=client&action=connect">connecter</a></b> afin d\'écrire votre post  </p>
  ';
}?> 
</div>
