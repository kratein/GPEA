<html>
  <?php require_once 'components/head.php'; ?>
  <body>
    <?php 
        require_once 'components/header.php'; 
        require_once '../controller/controller_activities.php';
        //$activities = GetHobbiesObject();
        if(!empty($_GET['page']))
        {
          $page = $_GET['page'];
        }
        else 
        {
          $page = 1;
        }
        $activities = data_page($page);
    ?>
    <!-- card thumbnail 348*225px -->
    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Nos activités</h1>
          <p class="lead text-muted">Voici toutes les activités que nous vous proposons</p>
        </div>
      </section>
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php
              foreach ($activities as $activity) {
                echo "<div class='col-md-4'>
                <div class='card mb-4 shadow-sm'>
                  <img class='card-img-top' width='348' heigt='255' src='".$domain.$activity->getCover()."'>
                  <div class='card-header'>
                    <div class='mx-auto'>
                      <p>".$activity->getLabel()."</p>
                    </div>
                  </div>
                  <div class='card-body'>
                    <p class='card-text'>".$activity->shortDescription().".</p>
                    <div class='d-flex justify-content-between align-items-center'>
                    <form action='".$domain."activite/".$activity->getId()."' method='get'>
                      <div class='btn-group'>
                        <button type='submit' class='btn btn-sm btn-outline-secondary'>Voir</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>";
              }
            ?>
          </div>
          <?php 
          pagination($activities, $page);
          ?>
        </div>
      </div>

  <?php require_once 'components/footer.php'; ?>
  </body>
  <?php require_once 'components/footer.php'; ?>
</html>