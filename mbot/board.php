<!doctype html>
<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Board mbot</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="favicon.ico">
	<style>.map-container{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
	}
	.map-container iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
	}</style>
	

	<!--Google Font link-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">


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
								<a href="" class="btn btn-danger m-top-20">Telecharger le relevé .csv</a>
								<a href="#features" class="btn btn-primary m-top-20">Carte</a>
							</div>
						</div>

						
						<div class="scrooldown">
							<a href="#features"><i class="fa fa-chevron-down"></i></a>
						</div>
						<div class="col-md-8">
							<table class="table table-bordered">
								<thead class="thead-dark">
									<tr>
										<th scope="col" class="text-white">Nom Robot</th>
										<th scope="col"class="text-white">Longitude</th>
										<th scope="col"class="text-white">Latitude</th>
										<th scope="col" class="text-white">Date</th>
										<th scope="col" class="text-white">Température</th>

									</tr>
								</thead>
								<tbody>
									<?php
									for ($i = 1; $i <= 10; $i++) {

										echo '<tr>
										<td class="text-white">Nom'.$i.'</td>
										<td class="text-white">Longitude'.$i.'</td>
										<td class="text-white">Latitude'.$i.'</td>
										<td class="text-white">Date'.$i.'</td>
										<td class="text-white">Température'.$i.'</td>	
										</tr>';
									}

									?>
								</tbody>
							</table></div>

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
						<!--Google map-->
						<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2889.697847561259!2d7.099413715474127!3d43.59200957912353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sus!4v1584643710493!5m2!1sfr!2sus" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>

						<!--Google Maps-->

					</div>
				</div><!-- End off container -->
			</section><!-- End off Featured Section-->





			<!-- scroll up-->
			<div class="scrollup">
				<a href="#"><i class="fa fa-chevron-up"></i></a>
			</div><!-- End off scroll up -->


			<footer id="footer" class="footer bg-black">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="main_footer text-center p-top-40 p-bottom-30">
								<p class="wow fadeInRight" data-wow-duration="1s">
									Made by Thomas Paredes Mbot
									2020
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>




		</div>

		<!-- JS includes -->

		<script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
		<script src="assets/js/vendor/bootstrap.min.js"></script>

		<script src="assets/js/jquery.magnific-popup.js"></script>
		<script src="assets/js/jquery.easing.1.3.js"></script>
		<script src="assets/js/swiper.min.js"></script>
		<script src="assets/js/jquery.collapse.js"></script>
		<script src="assets/js/bootsnav.js"></script>



		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
	</html>
