

<div>
  <?php if (isset($_SESSION['id'])){ ?>
    <form name="AjoutCommentaire" action="?page=commentaire&action=delete" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idpost" value="<?php echo $postLecture['idpost']; ?>">
            <div style="float:none; margin:2%;">
                <button class="btn btn-outline-primary" type="submit" id="envoyerCommentaire"> Je souhaite supprimer mon commentaire</button>
            </div>
        </div>
    </form>
<?php }
else{
  echo '<p style="text-align:center; margin:2%;"> Veuillez vous <b><a href="?page=client&action=connect">connecter</a></b> afin d\'écrire votre post  </p>
  ';
}?> 
</div>
