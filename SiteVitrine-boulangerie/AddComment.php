<!DOCTYPE html>
<html>
	<head>
		<title>Ajoutez un commentaire</title>
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
		<?php include 'file:///C:/wamp64/www/TestFrom/TestPDO/nabar.php'; ?>

		<div id="contenue" class="container-fluid">
			<div class="row">
				<div class="col-sm-2"> <img src="img/franchise-feuillette.jpg" id="logo"></div>
				<div class="col-sm-8" id="LoginBlock">
					<div class="row">
						<div class="col-sm-12" id="BlogBlock">
							<form action="avis.php" method="POST">
								<label class="Labell">Votre Avis</label>
								<textarea style="height: 200px;" name="contenue" class="ChampAvis" placeholder="Mon avis ..." required></textarea>
								<br>
								<input type="submit" name="valider">
							</form>
						</div>
						<hr>
					</div>
				<div class=".col-sm-2"></div>
			</div>
		</div>
	</body>
</html>
