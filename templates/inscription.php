<?php ob_start();
?>

<div>
	<fieldset class="introconnexion">
		<p class="titre"> Vous n'êtes pas encore inscrit? </p>
		<p class="soustitre"> Créer votre compte dès maintenant </p>
	</fieldset>
</div>
<br>
<div>
	<fieldset class="connexionform">
		<legend> Inscription </legend>
		<form name="inscription" method="post" action="index.php?page=client&action=create">
			<p class="para"> Créer votre compte :</p>
			<table id="inscriptiontable">
				<tr>
					<td class="oblig"> Nom :</td>
					<td> <input type="text" name="nom" id="nom"> </td>
					<td class="oblig"> Prénom :</td>
					<td> <input type="text" name="prenom" id="prenom"> </td>
				</tr>
				<tr>
					<td class="oblig"> Pseudo :</td>
					<td> <input type="text" name="username" id="username"></td>
					<td class="oblig"> Adresse mail :</td>
					<td> <input type="text" name="mail" id="mail" placeholder=" p.ex.bonjour@contact.net"></td>

				</tr>
				<tr>
					<td class="oblig"> Mot de passe :</td>
					<td> <input type="password" name="password" maxlength="10" id="password"></td>
				</tr>
				<tr>
					<td colspan="4">
						<input type="submit" name="nouveauClient" value="créer un compte" size="50"> </td>
				</tr>
			</table>
		</form>
	</fieldset>
</div>


<?php
$body = ob_get_clean();

require('templates/template.php');
?>