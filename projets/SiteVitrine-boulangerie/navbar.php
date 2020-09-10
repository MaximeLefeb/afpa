<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=afpa;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	session_start();
?>

<nav class="col-sm 12" id="navBar">
	<ul class="row">
		<a href ="Acceuil.php" class="col-sm-4 lienNav"><li class="col-sm 3 navLi">Acceuil</li></a>
		<a href ="TarifProduit.php" class="col-sm-4 lienNav"><li class="col-sm 3 navLi">Nos produits / Tarifs</li></a>
		<?php
			if (isset($_SESSION['id']))
			{
				echo "<a href ='../TestPDO/monProfile.php' class='col-sm-4 lienNav'><li class='col-sm 3 navLi'>Mon compte</li></a>";
			}
			else
			{
				echo "<a href ='login.php' class='col-sm-4 lienNav'><li class='col-sm 3 navLi'>Connexion / Inscription</li></a>";
			}
		?>
	</ul>
</nav>
