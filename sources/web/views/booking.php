<html>
  <?php require_once 'components/head.php'; ?>
<body>
	  <?php require_once 'components/header.php'; 
          if (!empty($_GET['id'])) 
        {
            $id = $_GET['id'];
            $hobby = GetHobbyObject($id);
			$photos = GetPhotosActivityObject($hobby->getId());
			$user = GetUserObject($_SESSION['userId']);
		  }
		  if (isset($_POST['submitform']))
		  {   
		  ?>
	  <script type="text/javascript">
	  window.location = "./activity/$id";
	  </script>      
		  <?php
		  } 
		  ?>
  <body>
  	<div class="container-fluid bookingForm mx-auto">
		<div class="row align-items-center">
		<!-- Item 1 -->
			<!-- Material form register -->
			<div class="col-12">
			<div class="card"> 
  				    <h5 class="card-header info-color white-text text-center py-4">
					<strong>Réserver cette activité : <?php
					echo $hobby->getLabel();
					?>
					</strong>
			    </h5>
			    <br>
	  <div class="row justify-content-center float-left">

			<div class="col-md-4">
          <?php 
                echo "<img src='".$domain.$photos[0]->getPath()."' class='img-fluid rounded '>";    
            ?>
	</div>
	<div class="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-8">
			    <!--Card content-->
			    <div class="card-body">

			        <!-- Form -->
			        <form class="" action="<?php echo $domain;?>controller/controller_booking.php" name="submitform" method="POST" style="color: #757575;">
		  				<input value="<?php echo $id?>" name="activity_id" hidden/>
			            <div class="form-row">
			                <div class="col">
			                    <!-- First name -->
			                    <div class="md-form">
			                        <input type="text" name="firstName" class="form-control" value="<?php echo $user->getFirstName(); ?>" disabled>
			                    </div>
			                </div>
			                <div class="col">
			                    <!-- Last name -->
			                    <div class="md-form">
			                        <input type="text" name="lastName" class="form-control"  value="<?php echo $user->getLastName(); ?>" disabled>
			                    </div>
			                </div>
			            </div><br>

			            <!-- E-mail -->
			            <div class="md-form mt-0">
			                <input type="email" class="form-control" name="email" value="<?php echo $user->getEmail(); ?>" disabled>
			            </div><br>
						<div class="form-group"> 
	<input type="range" name="nbPeopleRange" id="nbPeopleRange" class="form-control-range slider"  min="1" max="<?php echo $hobby->getOlder(); ?>" value="<?php echo $hobby->getOlder()/2; ?>" id="formControlRange">
	<label for="formControlRange">Nombre de participants: <span id="nbPeople"></span></label>
</div>
				<script>
				var slider = document.getElementById("nbPeopleRange");
				var outputRange = document.getElementById("nbPeople");

				var outputPrice = document.getElementById("nbPeople");
				outputRange.innerHTML = slider.value;

				slider.oninput = function() {
					outputRange.innerHTML = this.value;
				}
				</script>
			            <!-- Date-->
			            <div class="md-form container">
							<div class="row">
								<div class="col">
						<label>Date</label>	

						</div>					
						<div class="col">
						<input type="date" name="date" class="form-control datepicker" placeholder="Date"/>
							
						</div>
						<div class="col">
						<select class="form-control" id="hours" name="hours">
								<?php foreach(range(8,17) as $i){
									echo "<option value=$i>$i h</option>";
								}
								?>
								</select>
							</div>
							<div class="col">
							<select class="form-control" id="minutes" name="minutes">
								<option value="0">00</option>
								<option value="30">30</option>
								</select>
							</div>
							</div><br>
									<div>
			            <!-- Sign up button -->
			            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Reserver</button>
	       
			        </form>
			        <!-- Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
</div>
</div>
<!-- Material form register -->

  <?php require_once 'components/footer.php'; ?>
</html>