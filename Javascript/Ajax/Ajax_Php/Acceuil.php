<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceuil</title>
        <!-- BOOTSTRAP -->
        <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
	</head>

	<body> 
        <!--<button class="btn btn-primary m-5" id="bonjour">Bonjour</button>
        <select id="selecter" class="form-control form-control-lg ml-5 mr-5"></select>
    
        <h1>Exo 3 :Formulaire</h1>
        <div id="message" ></div>
        <form id="form" action="">
            <input type="text" name="prenom" id="input-prenom">
            <input type="text" name="nom" id="input-nom">
            <input type="submit" value="verifier">
        </form> -->

        <div class="container">
            <div class="row">
                <div class="col-6 mt-5">
                    <select name="marque" id="selecterMarque" class="form-control form-control-lg">
                        <option value="">Sélectioner une marque</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Audi">Audi</option>
                    </select>
                </div>

                <div class="col-6 mt-5">
                    <select name="modele" id="selecterModele" class="form-control form-control-lg">
                        <option value="">Séléctioner un modèle</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5">
                    <table class="table table-striped table-dark text-center">
                        <thead>
                            <th>Marque</th>
                            <th>Modele</th>
                        </thead>

                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
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