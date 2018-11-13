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
        <a class="nav-link" href=<?php echo $domain."activites/page/1"?>>Activités</a>
      </li></ul>
           <?php 
     if (isset($_SESSION['userId'])){
      echo "<div class='login-container'>
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
    <button type="button" class="btn btn-success" data-toggle="modal" data-backdrop="false" data-target="#loginModal">Login</button>
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
            <h3 class="modal-title">Please Sign In</h3>
            <button type="button" class="close" data-dismiss="modal"></button>
            <span>&times;</span>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="username" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-center"> 
              <button type="submit" class="btn btn-success">Sign in</button>
            </div>
          </div>
          <!--- Connect 
          <div class="my-4">
            <div class="container-fluid padding">
              <div class="row text-center padding">
                <div class="col-12">
                <h2>Connect</h2>
                </div>
                <div class="col-12 social padding">
                  <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-google-plus-g"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
          -->  
          </div>
        </div>
      </div>
</header>