<!DOCTYPE html>
<html>
	<head>
		<title>Nos produits / tarifs</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
		<meta charset="utf-8">
		<link
			href ="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
			rel  ="stylesheet">
		<script
			src         ="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin ="anonymous">
		</script>
	</head>

	<body>
		<nav class="col-sm 12" id="navBar">
			<ul class="row">
				<a href ="Acceuil.php" class="col-sm-4 lienNav"><li class="col-sm 3 navLi">Acceuil</li></a>
				<a href ="Blog.php" class="col-sm-4 lienNav"><li class="col-sm 3 navLi">Blog</li></a>
				<a href ="login.php" class="col-sm-4 lienNav"><li class="col-sm 3 navLi">Espace Utilisateur</li></a>
			</ul>
		</nav>

		<div id="contenue" class="container-fluid">
			<div class="row" id="bgd">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" id="QuiSommeNous">
					<div class="row">
						<div class="col-sm-12 articles">
							<img src="img/macarons.jpg">
							<div id="viennoiserie">
								<p id="prixV">
									<span class="prix">0.90€ </span><br>/ unités
								</p>
								<input type="submit" class="Boutton" value="Commandez" id="BouttonCommandez"/>
							</div>
						</div>
						<div class="col-sm-12 articles">
							<img src="img/pain-au-chocolat.jpeg">
							<div id="viennoiserie">
								<p id="prixV">
									<span class="prix">1.00€ </span><br>/ unités
								</p>
								<input type="submit" class="Boutton" value="Commandez" id="BouttonCommandez"/>
							</div>
						</div>
						<div class="col-sm-12 articles">
							<img src="img/baguette.jpg">
							<p id="prixV">
								<span class="prix">0.30€ </span><br>/ unités
							</p>
							<input type="submit" class="Boutton" value="Commandez" id="BouttonCommandez"/>
						</div>
						<div class="col-sm-12 articles">
							<img src="img/Gateau.jpg">
							<div id="viennoiserie">
								<p id="prixV">
									<span class="prix">0.90€ </span><br>/ unités
								</p>
								<input type="submit" class="Boutton" value="Commandez" id="BouttonCommandez"/>
							</div>
						</div>
					</div>
				</div>
				<div class=".col-sm-2"></div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="script.js"></script>
	</body>
</html>
