<?php
  require_once '../modele/api.php';
  session_start(); 
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
        <a class="nav-link" href=<?php echo $domain."activites/page/1"?>>Activités</a>
      </li></ul>
           <?php 
     if (isset($_SESSION['userId'])){
      echo "<div class='login-container'>
      <a href='".$domain."controller/disconnect.php'> <button type='button' class='btn btn-success'>Déconnexion</button></a>
      <div class='image_outer_container'>
        <div class='green_icon'></div>
        <div class='image_inner_container'>
          <img src=".$_SESSION['photoPath'].">
        </div>
      </div>
      </div>";
     }else{
      echo '
      <div class="login-container">
    <button type="button" class="btn btn-success" data-toggle="modal"  data-target="#loginModal">Se connecter</button>
    </div>';
  }
  ?>

    <form action="search.php" class="form-inline my-2 my-lg-0">

      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Rechercher" aria-label="Search">

      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit-search">Rechercher</button>
    </form>

  </div>
</nav>

<!-- Modal Class -->
    <div class="modal fade" role="dialog" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Connexion</h3>
            <button type="button" class="close" data-dismiss="modal"></button>
            <span>&times;</span>
          </div>
          <div class="modal-body">
          <form action="<?php echo $domain ?>controller/controller_login.php" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          </div>
          </div>
          <div class="modal-footer">
            <div class="text-center"> 
                <button type="submit" id="submit" class="btn btn-success">Se connecter</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
</header>