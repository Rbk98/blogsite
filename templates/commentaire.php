

<?php
ob_start();
?>

<div>
<p style="margin:4%;"> <b><u> Commentaires</u></b></p><br>

<?php foreach ($comments as $comment){ ?>       
   <div style="float:right; margin:2%;">
    <form name="afficherComment" method="POST" action="?page=commentaire&action=liste&idpost=<?php echo $_GET['idpost']; ?>">
        <input type="hidden" name="idpost" value=" <?php $_GET['idpost']; ?>">
    </form> </div>
        <div style="margin-left:35%; ">
        <table style="margin: 2%;"> <tr> <td>
          Le <?php echo $comment['created_at'];?> : <input type="text" name="content" id="content" rows="6" value="<?php echo $comment['content'];?>"> </td>
            <?php if (isset($_SESSION['id_client'])){
            if ( $_SESSION['id_client'] == $comment['id_client']){ ?>
              <td> <button   type="submit" id="modifCommentaire"><a href="?page=commentaire&action=update&id=<?= $comment['id']; ?>">Modifier</button> </td>
              <td><button  type="submit" id="supprCommentaire"> <a href="?page=commentaire&action=delete&id=<?= $comment['id']; ?>">Supprimer</button> </td>
        <?php } } ?>  </tr> <?php }?> 
            </table>  </div>

  <?php if (isset($_SESSION['id'])){ ?>
<div class="shadow-lg rounded" style="margin:8%;">
    <form name="AjoutCommentaire" action="?page=commentaire&action=create&idpost=<?php echo $_GET['idpost']; ?>" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idpost" value="<?php echo $_GET['idpost']; ?>">

            <p style="margin:2%;"><?php echo $_SESSION['username'];?> :</p>
            <input type="text" style="margin:2%;" name="content" class="form-control" placeholder="Ecrire un commentaire...">
            <div style="margin:2%;">
                <button class="btn btn-outline-primary" type="submit" id="envoyerCommentaire">Envoyer le commentaire</button>
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

<div>
        <button style="margin:1%;" type="button" class="btn btn-outline-primary btn-sm"> <a href="?page=post&action=liste"> Retour aux actualités </a></button>
</div>

<?php
$body = ob_get_clean();

require('templates/template.php');
?>