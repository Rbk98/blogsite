<?php
ob_start();
?>

<!-- contenu principal -->
<div>
	<fieldset class="introconnexion">
		<p style="text-align:center; margin:1%;"> <b> Mes données personnelles : </b></p>
	</fieldset>
</div>
<br>

<div>
<?php
foreach($clients as &$client){
?>

	<fieldset id="inscriptionform">
		<legend> Bienvenue <?php echo '' . htmlspecialchars($client["username"]) . ''; ?>, voici tes données : </legend>
		<table id="inscriptiontable">
			<tr>
				<td> <b> Ton pseudo est : </b> </td>
				<td> </td>
				<td><?php echo '' . htmlspecialchars($client["username"]) . ''; ?></td>
			</tr>
			<tr>
				<td> <b>Ton nom :</b> </td>
				<td> </td>
				<td> <?php echo '' . htmlspecialchars($client["nom"]) . ''; ?> </td> 
			</tr>
			<tr>
				<td> <b> Ton prénom : </b> </td>
				<td> </td>
				<td> <?php echo '' . htmlspecialchars($client["prenom"]) . ''; ?></td>
			</tr>
			<tr>
				<td> <b> L'adresse mail de ton compte est : </b> </td>
				<td> </td>
				<td><?php echo '' . $client["mail"] . ''; ?></td>
			</tr>
		</table>
	</fieldset>
<?php }
?>
</div>


<?php
$body = ob_get_clean();

require('template.php');
?>