<?php ob_start(); ?>


<fieldset style="border: none; text-align: center; font-variant: small-caps; font-weight: bold;">
    <br>
    <p> Vous souhaitez vous deconnecter ? </p>
    <form action="index.php?page=client&action=deconnexion" method="POST">
        <input type="submit" style="background-color:lightskyblue; border: 2px solid black" value="deconnexion" class="btn btn-secondary" name="deconnexion">
    </form>
</fieldset>

<?php
$body = ob_get_clean();
require('template.php');
?>