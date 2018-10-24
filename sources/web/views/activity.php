<html>
  <?php require_once 'components/head.php'; ?>
  <body>
    <?php 
        require_once 'components/header.php'; 

        if (!empty($_GET['id'])) 
        {
            $id = $_GET['id'];
            $hobby = GetHobbyObject($id);
            var_dump($hobby);
        ?>


        <?php
        }
    ?>
    <div>

    </div>

  <?php require_once 'components/footer.php'; ?>
  </body>
  <?php require_once 'components/footer.php'; ?>
</html>