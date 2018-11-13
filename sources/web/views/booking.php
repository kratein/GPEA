<html>
  <?php require_once 'components/head.php'; ?>
<body>
      <?php require_once 'components/header.php'; 


  require_once ('../../webapi/src/models/entities/Booking.php');
    require_once ('../../webapi/src/models/entities/User.php');
  //require_once ('../../webapi/src/models/DAO/BookingDao.php');
  //require_once('../modele/api.php');
  if (isset($_POST['register'])){
  	

  	$last_name = !empty($_POST['last_name']) ? trim($_POST['lsat_name']) : null;
  	$first_name = !empty($_POST['first_name']) ? trim($_POST['first_name']) : null;
  	$password = !empty($_POST['password']) ? trim($_POST['password']) : null;
  	$city = !empty($_POST['city']) ? trim($_POST['city']) : null;
  	$zipCode = !empty($_POST['zipCode']) ? trim($_POST['zipCode']) : null;
  	$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
  	$password = !empty($_POST['password']) ? trim($_POST['password']) : null;
  	$array = array(
  		'n_people' => 2, 
  		'id_user' => 1, 
  		'id_hobby_activity' => 1
  	);
  }
  	//addBooking(Booking::Create($array));
          if (!empty($_GET['id'])) 
        {
            $id = $_GET['id'];
            $photos = GetPhotosActivity($id);
            $hobby = GetHobbyObject($id);
  		}
  ?>
  <body>
  	<div class="container-fluid bookingForm">
		<div class="row align-items-center">
		<!-- Item 1 -->
			<!-- Material form register -->
			<div class="card"> 
  				    <h5 class="card-header info-color white-text text-center py-4">
			        <strong>Réserver cette activité</strong>
			    </h5>
			    <br>
  	<div class='row'>
    <div class='col-md-12'>
          <?php 
                echo "<img src='".$domain.$photos[0]->getPath()."' class='img-fluid'>";    
            ?>
	</div>
</div>



			    <!--Card content-->
			    <div class="card-body px-lg-5 pt-0">

			        <!-- Form -->
			        <form class="text-center" style="color: #757575;">

			            <div class="form-row">
			                <div class="col">
			                    <!-- First name -->
			                    <div class="md-form">
			                        <input type="text" class="form-control" placeholder="Prénom">
			                    </div>
			                </div>
			                <div class="col">
			                    <!-- Last name -->
			                    <div class="md-form">
			                        <input type="text" class="form-control" placeholder="Nom">
			                    </div>
			                </div>
			            </div><br>

			            <!-- E-mail -->
			            <div class="md-form mt-0">
			                <input type="email" class="form-control" placeholder="E-mail">
			            </div><br>
			            <!-- Password -->
			            <div class="md-form">
			                <input type="password" class="form-control" placeholder="Mot de Passe">
			            </div><br>

			            <!-- Phone number -->
			            <div class="md-form">
			                <input type="date" class="form-control" placeholder="Date">
			            </div><br>

			            <!-- Sign up button -->
			            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Reserver</button>

	       
			        </form>
			        <!-- Form -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Material form register -->

  <?php require_once 'components/footer.php'; ?>
</html>