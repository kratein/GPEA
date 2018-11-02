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
              <h1 class="jumbotron-heading"><?php echo $hobby->getLabel(); ?></h1>
              <p class="lead text-muted"><?php echo $hobby->getSlogan(); ?></p>
            </div>
            </section>
            <div class="container">
             <div class="row">
            <?php 
              foreach($photos as $photo) {
                echo "<div class='col-md-4'>
                <img  width='348' heigt='255' src='".$domain.$photo->getPath()."'>
                </div>
                ";
              }
            ?>
            
            </div></div>
            <div class="container">
              <div class="row">
                <div class='col-md-8'>
                  <p class="text-justify"><?php echo $hobby->getDescription(); ?></p>
                </div>
                  <div class='col-md-4'>
                    <p><?php echo $hobby->getAddress(); ?></p>
                    <p><?php echo 'Prix : '.$hobby->getPrice().' €'; ?></p>
                    <a href=<?php echo "'".$domain."reservation/".$hobby->getId()."'"; ?>><button type='button' class='btn btn-dark'>Réserver</button></a>
                  </div>
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