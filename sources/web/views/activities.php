<html>
  <?php require_once 'components/head.php'; ?>
  <body>
    <?php 
        require_once 'components/header.php'; 

        $activities = GetHobbiesObject();
    ?>
    <!-- card thumbnail 348*225px -->
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php
              foreach ($activities as $activity) {
                echo "<div class='col-md-4'>
                <div class='card mb-4 shadow-sm'>
                  <img class='card-img-top' width='348' heigt='255' src='".$activity->getCover()."'>
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
        </div>
      </div>

  <?php require_once 'components/footer.php'; ?>
  </body>
  <?php require_once 'components/footer.php'; ?>
</html>