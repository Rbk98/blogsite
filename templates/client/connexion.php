<?php ob_start(); 
?>

<div class="form-group">
<fieldset class="introconnexion">
<p class="titre"> Vous êtes déjà inscrit ? </p>
<p class="soustitre"> Connectez-vous à votre compte : </p>

</fieldset>
</div>
<br>
<div>
<fieldset class="connexionform"> <legend> Connexion </legend> 
<form name="connexion" method="post" action="connexion_post.php">
<table id="connexiontable">
<tr> <td> Pseudo </td> <td> <input type="text" name="username"></td> </tr>
<tr> <td> Mot de passe </td> <td> <input type="password" name="password" maxlength="10" ></td> </tr>
<tr> <td colspan="2"> <i> 10 caractères maximum <br> 5 caractères minimum </i> </td> </tr> 
</table>
<input type="submit" name="submit" value="Se connecter" size="50" class="buttonC" >
</form>

</fieldset>
</div>
<br>
<br>
<div>
    

<?php 
    $body = ob_get_clean();

    require ('template.php');
?>
