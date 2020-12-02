<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
		<meta charset="utf-8">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script
			src         ="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin ="anonymous">
		</script>
	</head>

	<body>
			<!-- Entête navigation -->
		<?php include 'C:\wamp64\www\TestFrom\SiteVitrine-boulangerie\navbar.php'; ?>

			<!-- Carrousel -->
		<div id="contenue">
			<div class="row" id="bgd">
				<div class="col-md-12" id="QuiSommeNous">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
							<!-- Image du carrousel -->
						<div class="carousel-inner">
							<div class="carousel-item active"> <!-- Image 1 -->
								<img class="d-block w-100 image" src="img/Background.jpg">
							</div>
							<div class="carousel-item"> <!-- Image 2 -->
								<img class="d-block w-100 image" src="img/boulangerie.jpg">
							</div>
							<div class="carousel-item"> <!-- Image 3 -->
								<img class="d-block w-100 image" src="img/boulangerie2.jpg">
							</div>
						</div>
							<!-- Boutton Precedent&Suivant Carrousel-->
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>

						<!-- Bloc texte descriptif -->
					<div id="descriptif">
						<h1> Qui Sommes nous ?</h1>
						<p>
							<span id="nomBlg">FEUILLETTE</span>, c’est avant tout l’histoire d’un couple d’artisans passionnés. Laure et Jean-François <span id="nomBlg">FEUILLETTE</span>, pâtissiers de formation se rencontrent à l’INBP (Institut National de la Boulangerie-Pâtisserie). Après être passés par de belles maisons, ils s’installent au centre-ville de Blois et ouvrent le « Théâtre du Pain » à 22 ans. C’est en 2009 que le couple fonde <span id="nomBlg">FEUILLETTE</span>, un nouveau concept à mi-chemin entre la boulangerie traditionnelle et la modernité que demande leur clientèle. La boulangerie qu’ils créent doit être facile d’accès, offrir un large choix de gourmandises salées et sucrées et du pain chaud à toute heure de la journée. Tous deux passionnés de salons de thé, ils s’inspirent d’une maison de famille pour créer le cadre chaleureux et chic du salon de thé <span id="nomBlg">FEUILLETTE</span>.
							Dès son ouverture la boulangerie <span id="nomBlg">FEUILLETTE</span> se fait connaître pour son salon de thé, sa terrasse et la qualité de ses produits. Ouverte 7 jours sur 7, la boulangerie devient un incontournable dans la journée de chacun, que ce soit pour un petit-déjeuner gourmand, un déjeuner sur le pouce ou un goûter en famille.
						</p>
						<hr>
					</div>
				</div>

						<!-- Vidéos -->
		<div id="divBlocVideo" class="container-fluid">
		<h2 class="lesH2">Nos Vidéos !</h2>
			<div class="row">
				<div class="col-md-3 col-sm-12 blocVideo">
					<div class="wpb_wrapper">
						<div class="wpb_video_widget wpb_content_element">
						<h3 class="wpb_heading wpb_video_heading titreVid">Feuillette</h3>
							<div class="wpb_video_wrapper">
								<iframe src="https://www.youtube.com/embed/kJYCxAHoiXE?feature=oembed" frameborder="0" allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-12 blocVideo">
					<div class="wpb_wrapper">
						<div class="wpb_video_widget wpb_content_element">
							<h3 class="wpb_heading wpb_video_heading titreVid">Pâtissier</h3>
							<div class="wpb_video_wrapper">
								<iframe src="https://www.youtube.com/embed/3stU3lCRt20?feature=oembed" frameborder="0" allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-12 blocVideo">
					<div class="wpb_wrapper">
						<div class="wpb_video_widget wpb_content_element">
							<h3 class="wpb_heading wpb_video_heading titreVid" >Salle</h3>
							<div class="wpb_video_wrapper">
								<iframe src="https://www.youtube.com/embed/7Jpusw95I0A?feature=oembed" frameborder="0" allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-12 blocVideo">
					<div class="wpb_wrapper">
						<div class="wpb_video_widget wpb_content_element">
							<h3 class="wpb_heading wpb_video_heading titreVid">Nos Baguettes</h3>
							<div class="wpb_video_wrapper">
								<iframe src="https://www.youtube.com/embed/oeJFLoN8t0k?feature=oembed" frameborder="0" allowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>

					<!-- Bloc Social -->
			<div class="col-sm-12" id="block_social">
				<h2 class="lesH2">Rejoignez nous sur les reseaux :)</h2><br>
		  		<ul class="social-network social-circle">
					<li><a href ="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
					<li><a href ="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href ="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href ="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a href ="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
			    </ul>
		      </div>
		</div>
	</div>
			<!-- Script -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="script.js"></script>
	</body>
</html>
