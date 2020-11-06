<?php 

    session_start();
    include_once 'crud.php';
    include_once 'crud_service.php';
    include_once 'crud_employe.php';

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- BOOTSTRAP -->
        <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
        <!-- CSS -->
        <style>
            #Contant {
                background-color   : #f2f2f2;
                height             : 100vh;
                -webkit-box-shadow : 0px 0px 19px 10px rgba(0,0,0,0.75);
                -moz-box-shadow    : 0px 0px 19px 10px rgba(0,0,0,0.75);
                box-shadow         : 0px 0px 19px 10px rgba(0,0,0,0.75);
            }
        </style>
    </head>

    <body>
        <div id="Contant" class="container pt-5">
            <div class="row">
                <div class="col-sm-12 text-center">

                    <?php
                        //* SI PAS CONNECTÉ
                        if (!$_SESSION) {
                            echo " <h1>Bonjour connecter vous pour accedez aux gestions des employes <br> 🤫 </h1> <hr> ";
                            //* SI ON AJOUTE
                            if (isset($_POST['add'])) {
                                //* SI LES CHAMPS SONT CORRECTS
                                if (isset($_POST['mail']) && !empty($_POST['mail']) &&
                                    isset($_POST['pwd']) && !empty($_POST['pwd'])) {

                                    //* VERIF USER EXIST
                                    $exist = userExist($_POST['mail']);

                                    //* TRUE
                                    if($exist) {
                                        echo 'Cette adresse mail est déjà utilisé';
                                        showButton('formSignUp.php', 'formSLogin.php', 'Réessayer', 'Se connecter');
                                    //* FALSE
                                    } else {
                                        AddUser($_POST['mail'], $_POST['pwd']);
                                        showButton('formSignUp.php','formLogin.php','Inscrire un nouvel utilisateur', 'Se connecter');
                                    }

                                } else {
                                    echo 'Les champs sont vide';
                                }
                            //* SI ON SE CONNECTE
                            } else if(isset($_POST['connect'])) {
                                //* SI LES CHAMPS SONT CORRECTS
                                if (isset($_POST['mailLogin']) && !empty($_POST['mailLogin']) &&
                                    isset($_POST['pwdLogin']) && !empty($_POST['pwdLogin'])) {

                                    ConnectUser($_POST['mailLogin'], $_POST['pwdLogin']);  

                                }
                            //* AFFICHAGE D'ACCEUIL
                            } else {

                                showButton('formSignUp.php','formLogin.php','S\'inscrire', 'Se connecter');

                            }
                        //* SI CONNECTÉ
                        } else {
                            //* VERIF TYPE OF USER
                            if ($_SESSION['tou'] == 'Administrateur') {
                                echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en administrateur <br> ';
                            } else {
                                echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en utilisateur <br> ';
                            }

                            showButton('formSignUp.php','disconnect.php','Inscrire un nouvel utilisateur', 'Se déconnecter');
                            ?>
                            <hr>
                            <div>
                                <h1>Accès tables</h1>
                                <a href="tableau_employe.php"><button type="submit" class="btn btn-primary">Voir la table employes</button></a>
                                <a href="tableau_service.php"><button type="submit" class="btn btn-primary">Voir la table service</button></a>
                            </div>
                            <?php

                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>