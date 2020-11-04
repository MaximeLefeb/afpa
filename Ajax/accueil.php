<!DOCTYPE html>
<html>
	<head>
		<title>Premier essaie ajax</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="ajax.css">
		<link 
			rel         ="stylesheet" 
			href        ="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
			integrity   ="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
			crossorigin ="anonymous">
		<script
			src         ="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin ="anonymous">
		</script>
	</head>

	<body>
	<!-- 	<form> 
		<input type="button" value="Test" onclick="getxhr()"> 
	</form> 
 -->
<!-- 	  		<?php
				echo '<ul>';
	
				if($dossier = opendir('./img'))
				{
					while(false !== ($fichier = readdir($dossier)))
					{
						if($fichier != '.' && $fichier != '..' && $fichier != 'acceuil.php')
						{
							echo '<li><img href="../Ajax/img/' . $fichier . '"></li>';
						}
					}
					echo '</ul><br/>';
					closedir($dossier);
				}
				else
				{
					echo 'Le dossier n\' a pas pu être ouvert';
				}
			?>   -->
		<h2>Cérémonie des Césars 2014</h2> 

		<form> 
			<input type="button" value="Afficher le César" onclick="extraire()"> 
		</form> 

		<div id="affichage"> 
			La réponse ici ! 
		</div> 
		

		<script 
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
			integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
			crossorigin="anonymous">
		</script>
		
		<script 
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
			integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
			crossorigin="anonymous">	
		</script>

		<script 
			type="text/javascript" 
			src="ajax.js">
		</script>
	</body>
</html>