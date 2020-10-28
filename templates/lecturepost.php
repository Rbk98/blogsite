<?php 
    ob_start();
?>

<div class="container_section">
<fieldset style="margin:8%;">
<br>
<p> <b>Contenu du post : </b></p>
<hr>
<?php 
$user= 'rbk98';
$password = 'devweb20';
try {
    $connection = new PDO('mysql:dbname=avenoel;host=localhost', $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

} catch (PDOException $exception) {
    die('Connexion échouée : ' . $exception->getMessage());
}

$statement = $connection->prepare('SELECT * FROM post');
$result = $statement->execute();
$donnees = $statement->fetchAll(PDO::FETCH_ASSOC);
$content = ($donnees['content']);

echo $content;

$connection = null;
?>
<hr>
<br>
<label for="exampleFormControlTextarea1"> <i>Ecrire un commentaire :</i></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea> 
    <button type="button" class="btn btn-dark" style="float:right;">Envoyer</button>
</fieldset>
</div>


<?php

    $body = ob_get_clean();

    require ('template.php');
?>
