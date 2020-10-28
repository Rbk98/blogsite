
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
   $user= 'rbk98';
   $password = 'devweb20';
   try {
       $connection = new PDO('mysql:dbname=avenoel;host=localhost', $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
   
   } catch (PDOException $exception) {
       die('Connexion échouée : ' . $exception->getMessage());
   }
   
    $statement = $connection->prepare('SELECT * FROM client');
    $result = $statement->execute();
    $donnees = $statement->fetchAll(PDO::FETCH_ASSOC);
    $donnees['username'] = stripslashes($resultat->username);
	$donnees['nom'] = stripslashes($resultat->nom);
	$donnees['prenom'] = stripslashes($resultat->prenom);
	$donnees['mail'] = $resultat->mail;
	$donnees['last_connection_at'] = $resultat->last_connection_at;
    $connection = null;
	
?>
<fieldset id="inscriptionform"> <legend> Mes données </legend> 
<table id="inscriptiontable">
<tr>  <td style = "text-align: center;"> <b>Nom</b> </td>  
	 <td> <?php echo''.htmlspecialchars($_SESSION["nom"]).''; ?> </td>
	 <td style = "text-align: center;"> <b> Prénom </b> </td>
	 <td> <?php echo''.htmlspecialchars($_SESSION["prenom"]).''; ?></td>
</tr>
<tr> <td style = "text-align: center;"> <b> Pseudo </b> </td>
	 <td><?php echo''.htmlspecialchars($_SESSION["username"]).''; ?></td>
	 <td style = "text-align: center;"> <b> Adresse mail </b> </td>
	 <td><?php echo''.$_SESSION["mail"].''; ?></td>
</tr>
</table>
</fieldset>
</div>
<br>
<br>
<div>
<fieldset style="border: 2px solid deepskyblue; display:inline-block; margin:0; width: 85%;"id="introinscription">
<p class="titre"> Vous souhaitez modifier votre compte? </p>
</fieldset>
</div>
<br>
<div>
<fieldset id="inscriptionform"> <legend> Modification du compte </legend> 
<form name="inscription"  method="post" action="modification_post.php">
<p class="para"> Modifier votre compte : </p>
<table id="inscriptiontable">
<tr>  <td> Pseudo actuel : </td> 
	 <td> <input type="text" name="pseudoactu" id="name"> <br> </td>	
	 <td> Nouveau pseudo : </td> 
	 <td> <input type="text" name="pseudonouv" id="prename"> </td> 
</tr>
<tr> <td class="oblig"> Adresse mail actuelle </td> 
	 <td> <input type="text" name="adressemailactu"  placeholder=" p.ex.bonjour@contact.net" id="pseudo" ></td> 
	 <td class="oblig"> Nouvelle adresse mail </td> 
	 <td> <input type="text" name="adressemailnouv" id="adrmail" placeholder=" p.ex.bonjour@contact.net"></td>
	  
</tr>
<tr> <td class="oblig"> Mot de passe actuel : </td> 
	 <td> <input type="password" name="mdpactu" maxlength="10" id="mdpold" ></td> 
	 <td class="oblig"> Nouveau mot de passe : </td> 
	 <td> <input type="password" name="mdpnouv" maxlength="10" id="mdp" ></td> 
</tr>

<tr> <td colspan="2"> <i> 10 caractères maximum <br> 5 caractères minimum </i> </td> 
	<td colspan="2"> <i> 10 caractères maximum <br> 5 caractères minimum </i> </td> </tr>
<tr> <td class="oblig"> Verification du nouveau mot de passe </td> <td> <input type="password" name="mdpnouvV" maxlength="10" id="mdpcheck"></td>
 </tr>

</table>
<input type="submit" name="modification" value="Modifier" size="50" >
</form>
</fieldset>
</div>
<br>
<br>

<?php 
	$id=$_SESSION['id'];
	const DB_USER = 'rbk98';
    const DB_PASSWORD = 'devweb20';

        try {
			$connection = new PDO('mysql:dbname=avenoel;host=localhost', 'rbk98', 'devweb20', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            echo ('Database connection success!');
        
        } catch (PDOException $exception) {
            die('Connexion échouée : ' . $exception->getMessage());
        }
	$bdd->close();
?>
</fieldset>
<div>
<br><br>
<div>
<fieldset style=" width:45%; border: 2px solid deepskyblue; display:inline-block; margin:0;"id="introconnexion">
<p class="titre"> Vous souhaitez vous déconnecter ? </p> <hr>
<p class="soustitre"> Merci de votre visite <b><?php echo''.addslashes($_SESSION["username"]).'' ?></b> </p>
<form name="deconnexion" method="post" action="deconnexion_post.php"> <input type="submit" name="deconnexion" value="Déconnexion" size="50"> </form>
</fieldset>
</div>
<br>

<?php 
    $body = ob_get_clean();
    
    require ('template.php');
?>