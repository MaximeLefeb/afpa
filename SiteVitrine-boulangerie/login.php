<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
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
		<?php include 'C:\wamp64\www\TestFrom\SiteVitrine-boulangerie\navbar.php'; ?>

		<div id="contenue">
			<div class="row">
				<div class=" col-md-12 col-md-6 col-sm-12 colForm">
					 <form class="formulaire" id="login" method="POST" action="login.php">
					
						<div>
							<label for="name">Pseudo :</label><br>
							<input type="text" name="pseudolog" required/>
						</div>
					   
						<div>
							<label for="pwd">Mot de passe :</label><br>
							<input type="password" name="mdplog" required/>
						</div>
					
						<div style="padding-top: 30px">
							<input type="submit" name="login" class="bouttonForm"/>
							<input type="button" name="registration" value="Pas encore inscrit ?" class="bouttonForm"/>
						</div> 

					</form>
				</div>

				<div class="col-md-12 col-md-6 col-sm-12 colForm">
					<form  method="post" action="login.php" style="margin: 30px;" class="formulaire" id="register" enctype="multipart/form-data">

						<div>
							<label for  ="name">Pseudo :</label><br>
							<input type ="text" name="pseudo" id="pseudo" required/>
						</div>

						<div>
							<label for  ="name">Nom :</label><br>
							<input type ="text" name="nom" id="nom" required/>
						</div>

						<div>
							<label for  ="name">Prénom :</label><br>
							<input type ="text" name="prenom" id="Prenom" required/>
						</div>

						<div>
							<label for  ="mail">Adresse mail :</label><br>
							<input type ="email" name="mail" id="mail" required/>
						</div>

						<div>
							<label for  ="mdp">Mot de passe :</label><br>
							<input type ="password" name="mdp" id="mdp" required/>
						</div>

						<br>
						<input type="checkbox" class="Boutton" required/>
						<label>J'accepte les conditions génral d'utilisation</label>
						<br>

						<input type ="submit" name="register" class="bouttonForm"/>

					</form>
				</div>		
			</div>
		</div>

		<?php
			if(isset($_POST('login')))
			{
				if(isset($_POST['pseudolog']) && isset($_POST['mdplog']))
				{
					$req = $bdd->prepare('SELECT id, mdplog FROM membres WHERE pseudolog = :pseudolog');
					$req->execute(array('pseudolog' => $_POST['pseudolog']));
					$resultat = $req->fetch();
					$req=NULL;
					$isPasswordCorrect = password_verify($_POST['mdplog'], $resultat['mdplog']);

					if (!$resultat)
					{
						echo "<script type='text/javascript'>alert('Mauvais identifiant ou mot de passe');</script>";
					}
					else
					{
						if ($isPasswordCorrect)
						{
							$_SESSION['id'] = $resultat['id'];
							$_SESSION['pseudolog'] = $_POST['pseudolog'];
							echo 'Vous êtes connecté ' . $_SESSION['pseudolog'];
							echo '<a href="deconnexion.php">Déconnexion</a><br/>';
							echo '<a href="monProfile.php">Espace membre</a><br/>';
						}
						else
						{
							echo "<script type='text/javascript'>alert('Mauvais identifiant ou mot de passe');</script>";
						}
					}
				}  
			}    

			if (isset($_POST['register'])) 
			{
				if (isset($_POST['pseudo']) &&
					isset($_POST['nom']) &&
					isset($_POST['prenom']) &&
					isset($_POST['mail']) &&
					isset($_POST['mdp']))
				{
					$pseudo = $_POST['pseudo'];
					$nom    = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$mail   = $_POST['mail'];
					$mdp    = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

					$request = $bdd->prepare('INSERT INTO membres(pseudo, nom, prenom, mail, mdp) VALUES (:pseudo, :nom, :prenom, :mail, :mdp)');

					if($request->execute(array(
						'pseudo' => $pseudo,
						'nom'    => $nom,
						'prenom' => $prenom,
						'mail'   => $mail,
						'mdp'    => $mdp
						)))
					{
						$bdd     = NULL;
						$request = NULL;
					}
					else
					{
						echo "<script type='text/javascript'>alert('Erreur  lors de l'insertion en base de données');</script>";
					}
				}
			}
		?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="script.js"></script>
	</body>
</html>
