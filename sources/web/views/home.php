<html>
  <?php require_once 'components/head.php'; ?>
  <body>
	<?php 
		require_once 'components/header.php'; 
		require_once '../controller/controller_home.php';
		$activities = carousel_data();
		carousel_display();
	?>
<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 cold-md-9 cold-lg-9 col-xl-10">
			<p class="lead">Nous sommes une organisation a but lucratif et prendrons tout l'argent qu'on peut et plus si possible.</p>
		</div>
		<div class ="col-sx-12 col-sm-12 col-md-3 col-lg-3 col-xl-2"> 
			<a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">View our Mantra
			</button></a>
		</div>
	</div>
</div>

<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Inoui</h1>

		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Essayez nos dernieres nouveautés</p>
		</div>
	</div>

<!--- Three Column Section -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 cols-sm-6 col-md-4">
			<i class="fas fa-users"></i>
			<h3>Emotions garanties</h3>
			<p>de 7 a 107 ans, il y en a pour toute la famille</p>
		</div>
		<div class="col-xs-12 cols-sm-6 col-md-4">
			<i class="fas fa-bowling-ball"></i>
			<h3>Depassez-vous</h3>
			<p>Avec des activites adaptes a tous les niveaux et toutes les envies</p>
		</div>
		<div class="col-sm-12 col-md-4">
			<i class="fab fa-angellist"></i>
			<h3>Facile</h3>
			<p>Ne vous prenez pas la tete a chercher, tout est ici</p>
		</div>
	</div>
	<hr class="my-4">
</div>


  
<!--- Meet the team -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Notre valeureuse équipe</h1>		
		</div>
	</div>
</div>
<!--- Cards -->
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-3 col-sm-6">
			<div class="card">
				<img class="card-img-top" src="ressources/img/benjamin.png">
				<a href="#" data-toggle="collapse" class="btn btn-outline-secondary" data-target="#profilBenjamin">Profil</a>
				<div id="profilBenjamin" class="collapse">
					<div class="card-body">
						<h4 class="card-text">Benjamin</h4>
						<p class="card-title">Benjamin est un entrepreneur entreprenant avec plus de 42 ans d'entreprenance</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="card">
				<img class="card-img-top" src="ressources/img/dylan.png">
				<a href="#" data-toggle="collapse" class="btn btn-outline-secondary" data-target="#profilDylan">Profil</a>
				<div id="profilDylan" class="collapse">
					<div class="card-body">
						<h4 class="card-title">Dylan</h4>
						<p class="card-text">Dylan est un developeur hors-pair avec un peu d'experience</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="card">
			<img class="card-img-top" src="ressources/img/youri.png">
			<a href="#" data-toggle="collapse" class="btn btn-outline-secondary" data-target="#profilYouri">Profil</a>			
				<div id="profilYouri" class="collapse">
					<div class="card-body">
						<h4 class="card-title">Youri</h4>
						<p class="card-text">Youri est un full stack developeur qui nous sauve la vie avec sa dexterite et sa rapidite d'execution hors du commun.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="card">
				<img class="card-img-top" src="ressources/img/madhi.png">
				<a href="#" data-toggle="collapse" class="btn btn-outline-secondary" data-target="#profilMadhi">Profil</a>			
				<div id="profilMadhi" class="collapse">
					<div class="card-body">
						<h4 class="card-title">Mahdi</h4>
						<p class="card-text">Mahdi est un developeur primordial pour l'équipe tant par sa capacite de jugement, de dissernement que sa joie de vivre.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- Two Column Section -->


<!--- Connect -->
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
  <?php require_once 'components/footer.php'; ?>
  </body>
</html>