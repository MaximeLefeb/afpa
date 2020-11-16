<?php 
    include_once '../Service/service_Service.php';
    include_once '../Presentation/form_add_Service.php';
    session_start();

    if (!$_SESSION) {
        header('location: ../Controleur/controleur_formSignUp.php');
    }

    if (isset($_GET)) {
        if ($_GET['action'] == 'ajouter') {
            afficherPageAjout();
        }
        
        if ($_GET['action'] == 'modify') {
            $Service = searchOneServ($_GET['idService']);
            $idServ = $Service->getIdService();
            $Serv   = $Service->getService();
            $ville  = $Service->getVille();
            afficherPageModif($idServ, $Serv, $ville);
        }
    }

    //*SEARCH ONE EMPLOYE
    function searchOneServ(String $idServ) :Service {
        $Service = service_Service::service_searchServ($idServ);
        return $Service;
    }
 
?>