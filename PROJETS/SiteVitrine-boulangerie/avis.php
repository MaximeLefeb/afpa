<!DOCTYPE html>
<html>
	<head>
		<title>Ajoutez un avis</title>
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
								<label class="Labell">Titre</label>
								<input type="text" class="ChampAvis" name="Titre" placeholder="Baguette" required>
								<br>

								<label class="Labell">Votre Avis</label>
								<textarea style="height: 200px;" name="contenue" class="ChampAvis" placeholder="Mon avis ..." required></textarea>
								<br>

								<input type="submit" name="valider">
								<input class="bouttonR" type="button" class="BouttonBlog" name="Ajouter un avis" value="Back to blog" onclick="window.location.href='	http://localhost:8001/TestFrom/SiteVitrine/Blog.php'">
							</form>
						</div>
						<hr>
					</div>
				<div class=".col-sm-2"></div>
			</div>
		</div>

		<?php
			if(isset($_SESSION['id'])){
				if(isset($_POST['Titre']) && isset($_POST['contenue'])){
					$Titre    = $_POST['Titre'];
					$contenue = $_POST['contenue'];
					$date     = new Datetime('now');
					$date     = $date->format('Y-m-d H:i:s');
					$id       = $_SESSION['id'];
					$request  = $bdd->prepare('INSERT INTO articles(IDAuteur, Date, Titre, contenue) VALUES (:id, :date, :Titre, :contenue)');

					if($request->execute(array(
						'id'       => $id,
						'date'     => $date,
						'Titre'    => $Titre,
						'contenue' => $contenue
						))) {

						echo "Article ajoutée avec succées dans -> 'Blog.php' ";

					}else{
						echo "Erreur à l'insertion";
						$arr = $request->errorInfo();
						print_r($arr);
					}

					$request = NULL;
					$bdd     = NULL;

				}
			}
			else
			{
				echo "Vous êtes pas connecté";
			}
		?>

		<script
			src         ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
			integrity   ="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
			crossorigin ="anonymous">
		</script>
		<script
			src         ="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
			integrity   ="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
			crossorigin ="anonymous">
		</script>
		<script
			type ="text/javascript"
			src  ="script.js">
		</script>
	</body>
</html>
