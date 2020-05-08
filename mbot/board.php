<!doctype html>
<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Board mbot</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="favicon.ico">
	<style>#map{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
	}
	#map iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
	}</style>
	
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/iconfont.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/bootsnav.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Responsive css-->
	<link rel="stylesheet" href="assets/css/responsive.css" />

	<script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>

	<script src="assets/js/jquery.magnific-popup.js"></script>
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<script src="assets/js/swiper.min.js"></script>
	<script src="assets/js/jquery.collapse.js"></script>
	<script src="assets/js/bootsnav.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/map.js"></script>



	
</head>

<body data-spy="scroll" data-target=".navbar-collapse">


	<!-- Preloader -->
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
			</div>
		</div>
	</div><!--End off Preloader -->


	<div class="culmn">
		<!--Home page style-->


		<nav class="navbar navbar-default bootsnav navbar-fixed white no-background">
			<div class="container">  

				<!-- Start Atribute Navigation -->
				<div class="attr-nav">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>        
				<!-- End Atribute Navigation -->


				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="#brand">
						Projet Mbot
					</a>

				</div>
				<!-- End Header Navigation -->

				<!-- navbar menu -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-center">
						<li><a href="#home">Accueil</a></li>                    
						<li><a href="#features">Carte</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div>   
		</nav>

		<!--Home Sections-->

		<section id="home" class="home">
			<div class="container">
				<div class="row">
					<div class="main_home">
						<div class="col-md-4">
							<div class="home_text">
								<h2 class="text-white">Relevé de Données par le Robot Mbot</h2>
							</div>
							<div><img src="assets/images/mbot.jpg" alt="" /></div>

							<div class="home_btns m-top-40">
								<a href="export.php" class="btn btn-danger m-top-20">Telecharger le relevé .csv</a>
								<a href="#features" class="btn btn-primary m-top-20">Carte</a>
							</div>
						</div>

						
						<div class="scrooldown">
							<a href="#features"><i class="fa fa-chevron-down"></i></a>
						</div>
						<div class="col-md-8">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="thead-dark">
										<tr>
											<th scope="col"class="text-white">Longitude</th>
											<th scope="col"class="text-white">Latitude</th>
											<th scope="col"class="text-white">Hauteur</th>
											<th scope="col" class="text-white">Date</th>
											<th scope="col" class="text-white">Température</th>

										</tr>
									</thead>
									<tbody>
										<?php
									//connexion bdd
										$host="localhost";
										$user="root";
										$password="";
										$db="test";

										$link = mysqli_connect($host,$user,$password,$db);

										if (!$link) {
											echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
										}

										//requete 
										$result = mysqli_query($link, "SELECT * FROM coordonnees order by date_ desc LIMIT 10");
										$i=0;

										while ($coordonnees = mysqli_fetch_assoc($result)) {

											echo '<tr id="idTr' .$i.'">
											<td class="text-white" id="long">'.$coordonnees['longitude'].'</td>
											<td class="text-white">'.$coordonnees['latitude'].'</td>
											<td class="text-white">'.$coordonnees['hauteur'].'</td>
											<td class="text-white">'.$coordonnees['date_'].'</td>
											<td class="text-white">'.$coordonnees['temperature'].'</td>
											</tr>';
											$i++;
										}

										mysqli_free_result($result);

										?>
									</tbody>
								</table></div>
							</div>

						</div>


					</div><!--End off row-->
				</div><!--End off container -->
			</section> <!--End off Home Sections-->



			<!--Featured Section-->
			<section id="features" class="features">
				<div class="container">
					<div class="row">
						<div class="main_features p-top-100">
							<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
								<div class="head_title text-center">
									<h2>Map du Trajet Mbot</h2>
									<h5>Mbot n°1</h5>
								</div>
							</div>

						</div>
					</div><!-- End off row -->


					

					<div class="row">
						<div id="map"></div>

						<script async defer
						src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhypER8NMGPxwvPPlrgJzBRNxCdPAKoNI&callback=initMap">
					</script>

				</div>
			</div><!-- End off container -->
		</section><!-- End off Featured Section-->





		<!-- scroll up-->
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>


		</div>


		

	</body>
	</html>
