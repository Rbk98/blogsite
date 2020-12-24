<?php ob_start();
?>

<head>
    <meta charset="utf-8">
    <title>- Blog Neurosciences cognitives -</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/98cf9202be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrapCustom.css">
    <link rel="stylesheet" href="assets/css/container.css">
</head>
<div>
    <fieldset style="border: none;
    text-align: justify;
    background-color: lightskyblue;
    border: 3px solid black;
    font-variant: small-caps;
    padding: 2% 5% 2% 5%;
    ">
    <p> De manière très générale, ce qui est "cognitif" est ce qui permet de connaître, ou ce qui concerne la connaissance. La "cognition" est la faculté de connaître. Ce terme fait ainsi référence à un ensemble d'activités mentales qui portent sur des connaissances : leur acquisition, leur stockage, leur transformation, leur utilisation…
        <br>
        L'émergence de cette discipline est dûe au fait qu'elle considère la connaissance en tant que système de traitement de l'information.
        <br>
        En d'autres termes, la connaissance est avant tout une activité (on parle alors d'activité cognitive). La cognition, en tant qu'activité mentale, met en œuvre un ensemble de processus mentales ; que l'on appelle les fonctions cognitives !
        <br>
        Dans cette perspective, la cognition correspond à l'ensemble des états et processus qu'un système physique naturel (cerveau humain) ou artificiel (système d'intelligence artificielle, robot) peut avoir, et qui permettent la construction de représentations internes de données externes, en vue de la réalisation d'actions.

        <br></p>
      <p style="text-align:center; font-weight:bold;">  Belle lecture sur ce blog, n'hésitez pas à y contribuer ! </p>
    </fieldset>
</div>
<div class="container">
    <div class="row" id="album">
        <?php foreach ($posts as $post) { 
            ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="public\images\images\blogpost.png" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title"> <?php echo $post['title']; ?></div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-sm"> <a href="?page=post&action=read&idpost=<?php echo $post['idpost']; ?>"> Voir </a></button>
                            </div>
                            <?php if (isset($_SESSION['id_client'])){
                                if ( $_SESSION['id_client'] == $post['id_client']){ ?>
                                
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-sm"> <a href="?page=post&action=update&idpost=<?php echo $post['idpost']; ?>"> Modifier </a></button>
                            </div>
                           <?php } }?>
                            <small class="text-muted"> Créé le <?php echo $post['created_at']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php

$body = ob_get_clean();

require('template.php');
?>