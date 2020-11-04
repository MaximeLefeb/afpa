<?php 
    session_start();

    /* 
    if (!$_SESSION) {
        header('location: formLogin.php');
    }  
    */

    include_once 'crud.php';

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
                            echo " <h1>Bonjour connecter vous pour accedez à des documents classé top secret <br> 🤫 </h1> ";
                            //* SI ON AJOUTE
                            if (isset($_POST['add'])) {
                                //* SI LES CHAMPS SONT CORRECTS
                                if (isset($_POST['mail']) && !empty($_POST['mail']) &&
                                    isset($_POST['pwd']) && !empty($_POST['pwd'])) {

                                    AddUser($_POST['mail'], $_POST['pwd']);

                                } else {
                                    echo 'Les champs sont vide';
                                }
                            //* SI ON SE CONECTE
                            } else if(isset($_POST['connect'])) {
                                //* SI LES CHAMPS SONT CORRECTS
                                if (isset($_POST['mailLogin']) && !empty($_POST['mailLogin']) &&
                                    isset($_POST['pwdLogin']) && !empty($_POST['pwdLogin'])) {
                                    
                                    ConnectUser($_POST['mailLogin'], $_POST['pwdLogin']);

                                }
                            //* AFFICHAGE PAR DEFAULT
                            } else {
                                echo "
                                    <br>
                                        <a type='button' class='btn btn-primary' href='formSignUp.php'>S'inscrire</a>
                                        <a type='button' class='btn btn-primary' href='formLogin.php'>Se connecter</a>
                                    <br>";
                            }
                        //* SI CONNECTÉ
                        } else {

                            echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'];

                            echo "
                                <br>
                                    <a type='button' class='btn btn-primary' href='formSignUp.php'>Inscrire un nouveau utilisateur</a>
                                    <a type='button' class='btn btn-primary' href='disconnect.php'>Se déconnecter</a>
                                <br>";
                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>