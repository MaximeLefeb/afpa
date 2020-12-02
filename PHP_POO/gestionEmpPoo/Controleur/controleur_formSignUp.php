<?php 
    include_once '../Presentation/formSignUp.php';
    include_once '../Service/service_Utilisateur.php';

    if (isset($_GET) && $_GET['action'] == "register") {
        afficherSignUp();
    } else {
        afficherLogin();
    }

?> 