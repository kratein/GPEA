<?php
  require_once '../modele/api.php';
  session_start(); 
  $tags = GetTagsObject();
?>
<header>
      <nav class="navbar navbar-inverse navbar-expand-lg navbar-light navbar-fixed-top scrolling-navbar">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <?php
  var_dump($_SESSION);
  ?>
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

    <div class="modal fade" role="dialog" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-item"><a class="nav-link" href="#login" role="tab" data-toggle="tab">Connexion</a></li>
              <li role="presentation" class="nav-item"><a class="nav-link" href="#signUp" aria-controls="loginTab" role="tab" data-toggle="tab">Créer un compte</a></li>
            </ul>
          </div>
          <div class="tab-content modal-body">
            <div class="tab-pane active" id="login">
              <form action="<?php echo $domain ?>controller/controller_login.php" method="post">  
              <div id="resultat">
            </div> 
              <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
          </div>             
                <div class="modal-footer">
                  <div class="text-center"> 
                    <button type="submit" id="submit" class="btn btn-success">Se connecter</button>
                  </div>
                </div>
              </form>
              </div>
              <div class="tab-pane" id="signUp">        
              <form action="<?php echo $domain ?>controller/controller_signUp.php" method="post">
                
              <div class="form-group">
                  <input type="text" name="firstName" class="form-control" placeholder="Prénom">
                </div>
                <div class="form-group">
                  <input type="text" name="lastName" class="form-control" placeholder="Nom">
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <input type="password" name="passwordConfirm" class="form-control" placeholder="Confirmez le mot de passe">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" placeholder="Date"/>
                </div>
                <div class="modal-footer">
                  <div class="text-center"> 
                    <button type="submit" id="submitSubscribe" class="btn btn-success">Créer un compte</button>
                  </div>
                </div>
              </form>
              </div>
          </div>
        </div>
          </div>
        </div>
      </div>
</header>
<script type="text/javascript" src="<?php echo $domain."ressources/js/login.js"?>"></script>