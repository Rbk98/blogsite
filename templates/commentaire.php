

<div>

<!-- Problème pour l'affichage des commentaires
       
   <div style="float:right; margin:2%;">
    <form name="afficherComment" method="POST" action="?page=commentaire&action=liste">
        <input type="hidden" name="idpost" value=" <?php //$postLecture['idpost']; ?>">
    </form> </div>
            <input type="text" name="content" id="content" rows="6" value="<?php //echo $comment['content'];?>">
            <?php //if (isset($_SESSION['id_client'])){
            //if ( $_SESSION['id_client'] == $comment['id_client']){ ?>
                <div class="shadow-lg rounded">
                    <form name="ModifierCommentaire" action="?page=commentaire&action=update" method="POST">
                    <div class="input-group mb-3">
                      <input type="hidden" name="id_client" value="<?php //echo $_SESSION['id']; ?>">
                      <input type="hidden" name="idpost" value="<?php // echo $_GET['idpost']; ?>">
                      <input type="text" name="content" class="form-control" value="<?php //$comment['content'];?>">
                    </form>
                </div>
        <div>
            <button class="btn btn-outline-primary" type="submit" id="modifCommentaire">Modifier</button>
            <form name="SupprimerCommentaire" action="?page=commentaire&action=delete" method="POST">
                 <input type="hidden" name="id_client" value="<?php // echo $_SESSION['id']; ?>">
                <input type="hidden" name="idpost" value="<?php //echo $_GET['idpost']; ?>">
                <button class="btn btn-outline-primary" type="submit" id="suppCommentaire">Supprimer</button>
             </form>
        </div>
        <?php //} }?> -->


  <?php if (isset($_SESSION['id'])){ ?>
<div class="shadow-lg rounded" style="margin:8%;">
    <form name="AjoutCommentaire" action="?page=commentaire&action=create" method="POST">
        <div class="input-group mb-2">
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idpost" value="<?php echo $postLecture['idpost']; ?>">

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
