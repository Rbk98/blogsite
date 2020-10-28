<?php 
    ob_start();
?>
  <form action="index.php?page=post&action=create" method="POST">
  <br>
  <fieldset class="formulaire_post">
  <table id="formulairetable"> <tr> <td>
    <input type="hidden" name="id_client" id="id_client" value="1">
    <label>Titre de votre post :</label>
    <input type="text" name="title" id="title"> </td> </tr>
    <tr> <td>
    <label>Ecrire votre nouveau post : </label>
    <input type="text" name="content" id="content" rows="6">
    <input type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:deepskyblue;" value="Publier mon post"> </td></tr></table>
  </fieldset>
  </form>

<?php

    $body = ob_get_clean();

    require ('template.php');
?>
