<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script
			src         ="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin ="anonymous">
		</script>
		<script
			type ="text/javascript"
			src  ="script.js">
		</script>
	</head>

	<body>
		<?php include 'file:///C:/wamp64/www/TestFrom/TestPDO/nabar.php'; ?>

		<div id="contenue" class="container-fluid">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" id="LoginBlock">
					<div class="row">

						<div class="col-sm-12" id="BlogBlock">
							<input class="bouttonR" type="button" class="BouttonBlog" name="Ajouter un avis" value="Ajouter un avis" onclick="window.location.href='	http://localhost:8001/TestFrom/SiteVitrine/avis.php'">
						</div>

						<?php
							$reqComment          = $bdd->query('SELECT * FROM commentaire');
							$req                 = $bdd->query('SELECT * FROM articles');
							$jointureMembres     = $bdd->prepare('SELECT * FROM membres INNER JOIN articles WHERE id = IDAuteur AND IDArticles = :id_article');
							$jointureCommentaire = $bdd->prepare('SELECT * FROM articles INNER JOIN commentaire WHERE idArticlesCom=IDArticles AND IDArticles = :id_article');

							$i = 1;

							//-----------------------------------insert commentaire bdd-------------------------------------
							if (isset($_POST["btnSubmit"]) &&
									isset($_POST['commentaire']))
							{
								if (isset($_SESSION['id']))
								{
									$commentaire = $_POST['commentaire'];
									$date        = new Datetime('now');
									$date        = $date->format('Y-m-d H:i:s');
									$id          = $_SESSION['id'];
									$idArticles  = $parcourReqCommentaire['IDArticles'];

									$request = $bdd->prepare('INSERT INTO commentaire(IdAuteurCom, idArticlesCom, date, commentaire) VALUES (:id, :IDArticles, :date, :commentaire)');

									if ($request->execute(array(
										'id'          => $id,
										'IDArticles'  => $idArticles,
										'date'        => $date ,
										'commentaire' => $commentaire
										)))
									{
										echo "Commentaire ajoutée avec succées";
									}
									else
									{
										echo "Erreur à l'insertion";
										$arr = $request->errorInfo();
										print_r($arr);
									}

									$request = NULL;
								}
								else
								{
									echo '<script>  alert("Vous êtes pas connecté")  </script>';
								}
							}


							//--------------------------------------Afficher articles-------------------------------------------------


							foreach ($req as $articles)
							{
								if($jointureMembres->execute(array('id_article' => $articles['IDArticles'])))
								{
									foreach($jointureMembres as $parcourReq){
										$pseudo = $parcourReq['pseudo'];
										$titre  = $parcourReq['Titre'];
										$text   = $parcourReq['contenue'];
										$date   = $parcourReq['Date'];

										echo "
											<div class ='col-sm-12 Avis' id='Avis-".$i."'>
												<div id='test'>
													<div class ='col-sm-12' id='entete'>
														<label>". $pseudo ."</label>
														</div>

													<div class ='col-sm-12' id='titre'>
														<label>". $titre ."</label>
													</div>

													<div id ='texte'>
														<p>
															". $text ."
														</p>
													</div>

													<div id ='footerAvis-".$i."' class='col-sm-12'>
														<label class='dateAvis' id  ='dateAvis-".$i."'>Publié le : ". $date ."</label>
													</div>
												</div>

												<div class='comment' id='comment-".$i."' class='row col-sm-12'>

												";
													//-------------------------------------------Afficher commentaire--------------------------------------------

												if($jointureCommentaire->execute(array('id_article' => $articles['IDArticles'])))
												{
													foreach($jointureCommentaire as $reqComment)
														{

														$commentaire = $reqComment['commentaire'];
														$date        = $reqComment['Date'];
														$auteur      = $reqComment['id'];

														echo "
															<hr>
															<div id='commentaire".$i."'>
																<div class ='col-sm-12' id='entete'>
																	<label>". $auteur ." ; </label>
																</div>
																<div id ='texte'>
																	<p>
																		". $commentaire ."
																	</p>
																</div>
																<div id ='footerAvis-".$i."' class='col-sm-12'>
																	<label class='dateAvis' id  ='dateAvis-".$i."'>Publié le : ". $date ."</label>
																</div>
															</div>

														";
													}
												}


												echo "

												</div>

												<div class='repondre' id='repondre-".$i."'>
													<hr>
													<div class='row col-sm-12'>
														<form action='Blog.php' method='post'>
															<div>
																<textarea style='height: 50px;' name='commentaire' class='ChampAvis' placeholder='Ma réponse...' required></textarea>
															</div>
														</div>
													</div>

													<input type='submit' class='bouttonForm sendButton' name='btnSubmit' value='Envoyer' id='sendButton-".$i."'>
												</form>

												<button class ='bouttonForm response' id='showComment-".$i."' name='repondre' onclick='showComment(".$i.")'>Afficher commentaire</button>

												<button class ='bouttonForm response' id='showR-".$i."' name='repondre' onclick='reponse(".$i."); buttonToggle(".$i."); '>Répondre</button>
											</div>
										";

										$i++;
									}
								}
							}
						?>
				<div class="col-sm-2"></div>
			</div>
		</div>

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
