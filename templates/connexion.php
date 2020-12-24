<?php ob_start(); ?>
<div class="container">
    <?php if (null !== $this->session->get('error')) { ?>
        <div class="alert alert-warning">
            <?= $this->session->showFlashMessage('error'); ?>
        </div>
    <?php } ?>

<div class="form-group">
    <fieldset class="introconnexion">
        <p class="titre"> Vous êtes déjà inscrit ? </p>
        <p class="soustitre"> Connectez-vous à votre compte : </p>

    </fieldset>
</div>
<br>
<div>
    <form name="connexion" method="POST" action="?page=client&action=connect">
        <fieldset class="connexionform">
        <legend> Connexion </legend>
            <table id="connexiontable">
                <tr>
                    <td> Pseudo : </td>
                    <td> <input type="text" name="username"></td>
                </tr>
                <tr>
                    <td> Mot de passe : </td>
                    <td> <input type="password" name="password" maxlength="10"></td>
                </tr>
                <tr>
                    <td colspan="2"> <i> 10 caractères maximum <br> 5 caractères minimum </i> </td>
                </tr>
            </table>
            <input class="buttonC" type="submit" name="connexion" value="Se connecter" size="20">
        </fieldset>
    </form>

</div>
<br>


<?php
$body = ob_get_clean();

require('templates/template.php');
?>