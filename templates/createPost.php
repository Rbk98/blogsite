<?php
ob_start();
?>
<fieldset class="introconnexion">
		<p style="font-size: 16px; margin:5px;"> Partagez votre connaissance !</p>
</fieldset>
<?php 
if(!isset($_SESSION["id"])){
  echo '<p style="text-align:center; margin:2%;"> Veuillez vous <b><a href="?page=client&action=connect">connecter</a></b> afin d\'écrire votre post  </p>
  ';
}
else{
echo'
<form action="index.php?page=post&action=create" method="POST">
  <input type="hidden" name="id_client" value="' . $_SESSION["id"] . ' ">
  <fieldset class="formulaire_post" style="margin-bottom: 10%;">
   <table id="formulairetable">
      <tr style="text-align:center;">
        <td>
          <label>Titre de votre post :</label>
          <input type="text" name="title" id="title"> </td>
      </tr>
      <tr>
        <td>
          <label>Ecrire votre nouveau post : </label>
          <input type="text" name="content" id="content"> 
          <input type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:deepskyblue;" value="Publier mon post"> </td>
      </tr>
    </table>
  </fieldset>
</form>';
}
?>

<?php

$body = ob_get_clean();

require('template.php');
?>