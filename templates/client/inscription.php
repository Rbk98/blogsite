<?php ob_start(); 
?>

<div>
<fieldset class="introconnexion">
<p class="titre"> Vous n'avez pas encore de compte ? </p>
<p class="soustitre"> Inscrivez-vous dès maintenant ! </p>
</fieldset>
</div>
<br>
<div>
<fieldset class="connexionform"> <legend> Inscription </legend> 
<form name="inscription"  method="post" action="inscription_post.php">
<p class="para"> Créer votre compte :</p>
<table id="inscriptiontable">
<tr>  <td class="oblig"> Nom :</td> 
     <td> <input type="text" name="nom"id="nom"> </td> 
	 <td class="oblig"> Prénom :</td> 
	 <td> <input type="text" name="prenom" id="prenom"> </td> 
</tr>
<tr> <td class="oblig"> Pseudo :</td> 
	 <td> <input type="text" name="username" id="username"></td> 
	 <td class="oblig"> Adresse mail :</td> 
	 <td> <input type="text" name="mail" id="mail" placeholder=" p.ex.bonjour@contact.net"></td>
	  
</tr>
<tr> <td class="oblig"> Mot de passe :</td> 
	 <td> <input type="password" name="password" maxlength="10" id="password"  ></td> 
 </tr>
<tr> <td colspan="2"> <i> 10 caractères maximum <br> 5 caractères minimum </i> </td></tr>
<tr> <td class="oblig"> Verification du mot de passe :</td> <td> <input type="password" name="mdpV" maxlength="10" id="mdpcheck"></td> </tr> 
<input type="submit" name="validation" value="Inscription" size="50" >
</form>
</fieldset>
</div>
    

<?php 
    $body = ob_get_clean();

    require ('template.php');
?>
