<html>
  <?php require_once 'components/head.php'; ?>
  <body>
    <?php 
        require_once 'components/header.php'; 

        if (!empty($_GET['id'])) 
        {
            $id = $_GET['id'];
            $hobby = GetHobbyObject($id);
            $photos = GetPhotosActivityObject($hobby->getId());
        ?>
        <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading"><?php echo $hobby->getLabel() ?></h1>
          <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue sapien in nulla pharetra convallis. Integer et erat tellus.</p>
          <div class="row">
          <?php
          foreach ($photos as $photo) {         
            echo "
            <div class='col-md-6'>
              <img id='myImg' class='card-img-top' width='348' heigt='255' src='".$domain.$photo->getPath()."'>
              <div id='myModal' class='modal'>

                <!-- The Close Button -->
                <span class='close'>&times;</span>

                <!-- Modal Content (The Image) -->
                <img class='modal-content' id='img01'>

                <!-- Modal Caption (Image Text) -->
                <div id='caption'></div>
              </div>
            </div>";
          }
          ?>
          </div>
        </div>
        </section>
        <?php
        }
    ?>
    <div>

    </div>

  <?php require_once 'components/footer.php'; ?>
  </body>
  <?php require_once 'components/footer.php'; ?>
</html>