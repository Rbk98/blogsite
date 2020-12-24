<?php
ob_start();
?>
<form action="index.php?page=post&action=update&idpost=<?= $post['idpost']; ?>" method="POST">
  <br>
  <fieldset class="formulaire_post">
    <table id="formulairetable">
      <tr>
        <td>
        <input type="hidden" name="id_client" value=" <?=$_SESSION["id_client"]; ?>">
        <input type="hidden" name="idpost" value=" <?=$post['idpost']; ?>">


          <label>Modifier le titre de votre post :</label>
          <input type="text" name="title" id="title" value="<?= $post['title'];?>"> </td>
      </tr>
      <tr>
        <td>
          <label>Modifier le contenu de votre post : </label> 
          <input type="text" name="content" id="content" rows="6" value="<?= $post['content'];?>"></td></tr>
      <tr><td>
          <input type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:deepskyblue;" value="Modifier mon post">
           </td> </form>
      </tr>
      <tr><td>
      <form action="index.php?page=post&action=delete&idpost=<?= $post['idpost']; ?>" method="POST">
       <input type="hidden" name="id_client" value=" <?=$_SESSION["id_client"]; ?>">
        <input type="hidden" name="idpost" value=" <?=$post['idpost']; ?>">
        <input type="hidden" name="title" value=" <?=$post['title']; ?>">
        <input type="hidden" name="content" value=" <?=$post['content']; ?>">
        <input type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:deepskyblue;" value="Supprimer mon post"> 
      </form>
      </td></tr>
    </table>
  </fieldset>
<br>
<?php

$body = ob_get_clean();

require('template.php');
?>