<?php
ob_start();
?>
<!-- contenu principal -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public\images\images\IAac.jpg" class="d-block w-100" alt="Introneuro">
      <div class="carousel-caption d-none d-md-block" style='margin: 20% 10% 22% 10%;'>
        <h3> <span class="badge badge-pill badge-light">Bienvenue sur le blog de Neurosciences cognitives</span></h3>
        <p class="badge badge-pill badge-light"> Une multitude d’articles pour vos neurones et sur vos neurones </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="public\images\images\IAac.jpg" class="d-block w-100" alt="Introneuro">
      <div class="carousel-caption d-none d-md-block" style='margin: 20% 10% 22% 10%;'>
        <h3> <span class="badge badge-pill badge-light">Découvrez les ressorts de votre cerveau... </span></h3>
        <p class="badge badge-pill badge-light"> A l'aide de nos nombreux posts publiés </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="public\images\images\IAac.jpg" class="d-block w-100" alt="Introneuro">
      <div class="carousel-caption d-none d-md-block" style='margin: 20% 10% 22% 10%;'>
        <h3> <span class="badge badge-pill badge-light">Participez à la découverte de ces connaissances </span></h3>
        <p class="badge badge-pill badge-light"> Des réponses pour vos questions et de quoi amenez d’autres questions </p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<?php
$body = ob_get_clean();

require 'templates/template.php';
?>