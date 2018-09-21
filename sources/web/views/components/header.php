<?php
  require_once 'D:\wamp64\www\GPEA\sources\web\modele\api.php';

  $tags = GetTagsObject();
?>
<header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <a class="logo" href="#"><i class="fas fa-quidditch"></i></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Activités</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tag activités
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            foreach ($tags as $tag) {
              echo "<a class='dropdown-item' href='#'>".$tag->getLabel()."</a>";
            }
          ?>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </div>
</nav>
</header>