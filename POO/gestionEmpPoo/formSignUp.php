<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire ajout</title>
         <!-- BOOTSTRAP -->
         <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
        <!-- JQUERY -->
        <script
            src         ="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin ="anonymous">
        </script>
        <!-- CSS -->
        <style>
            body {
                overflow-x:hidden;
            }
        </style>
    </head>
    
    <body>
        <?php include_once 'PHP_SQL.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <h1>Formulaire connexion</h1>
                    <form action="formSignUp.php" method="post">

                        <!-- NOM -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mail</label>
                            <input type="mail" class="form-control" name="mail">
                        </div>

                        <!-- EMPLOI -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type de profil</label>
                            <select class="form-control form-control-lg" name="typeOfUser">
                                <option value="Administrateur">Administrateur</option>
                                <option value="Utilisateur">Utilisateur</option>
                            </select>
                        </div>

                        <!-- MOT DE PASSE  -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" name="pwd">
                        </div>

                        <input name="add" type="submit" class="btn btn-primary"></input>

                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>