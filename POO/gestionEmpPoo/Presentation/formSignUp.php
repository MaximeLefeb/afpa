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
        <!-- CSS -->
        <style>
            body {
                overflow-x:hidden;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <?php 
                //*S'INSCRIRE
                function afficherSignUp() :Void {
                    ?>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 text-center">
                            <h1>Formulaire d'inscription</h1>
                            <form action="../Divers/Acceuil.php" method="POST">

                                <!-- MAIL SIGN UP -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail</label>
                                    <input type="mail" class="form-control" name="mail" required>
                                </div>

                                <!-- MOT DE PASSE SIGN UP -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe</label>
                                    <input type="password" class="form-control" name="pwd" required>
                                </div>

                                <input name="add" type="submit" class="btn btn-primary">

                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <?php
                } 
                //*SE CONNECTER
                function afficherLogin() :Void {
                    ?>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4  text-center">
                            <h1>Formulaire connexion</h1>
                            <form action="../Divers/Acceuil.php" method="POST">

                                <!-- MAIL LOGIN -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail</label>
                                    <input type="mail" class="form-control" name="mailLogin">
                                </div>

                                <!-- MOT DE PASSE LOGIN -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe :</label>
                                    <input type="password" class="form-control" name="pwdLogin">
                                </div>

                                <input name="connect" type="submit" class="btn btn-primary">

                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </body>
</html>