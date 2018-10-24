<?php
  require_once '../modele/api.php';

  $tags = GetTagsObject();
?>
<header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <a class="logo" href=<?php echo $domain."accueil"?>><i class="fas fa-quidditch"></i></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href=<?php echo $domain."activites"?>>Activités</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </div>
</nav>
</header>