<?php 
    include_once '../Service/service_Service.php';
    include_once '../Presentation/presentation_Service.php';
    session_start();
    
    //*SI NON CONNECTÉ
    if (!$_SESSION) {
        header('location: ../Controleur/controleur_formSignUp.php');
    }

    //*ADD SERV
    if (isset($_POST['add'])) {
        if (isset($_POST['idServ']) && !empty($_POST['idServ']) && 
            isset($_POST['serv']) && !empty($_POST['serv']) &&
            isset($_POST['ville'])&& !empty($_POST['ville'])) {  

            $idServ   = htmlentities($_POST['idServ']);
            $servName = htmlentities($_POST['serv']);
            $ville    = htmlentities($_POST['ville']);

            try {
                //*Search all service
                $dataServ = service_Service::service_searchAllServ();
                //*Select Dependence director
                $servDependence = service_Service::service_selectDependence();
                service_Service::service_addServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);
                afficherPageService($dataServ, $servDependence);
            } catch(ServiceException $ce) {
                afficherPageService($dataServ, $servDependence, $ce);
            }
        }
    }
    
    //*DELETE SERV
    if ($_GET && $_GET["action"]=="delete") {  
        if (!empty($_GET['idService'])) { 
            try {
                //*Search all service
                $dataServ = service_Service::service_searchAllServ();
                //*Select Dependence director
                $servDependence = service_Service::service_selectDependence();
                service_Service::service_delServ();
                afficherPageService($dataServ, $servDependence);
            } catch(ServiceException $ce) {
                afficherPageService($dataServ, $servDependence, $ce);
            }
        }
    }

    //*MODIFY SERV
    if (isset($_POST['modify'])) { 
        if (isset($_POST['idServ']) && !empty($_POST['idServ']) && 
            isset($_POST['serv']) && !empty($_POST['serv']) &&
            isset($_POST['ville'])&& !empty($_POST['ville'])) {  

            $idServ   = htmlentities($_POST['idServ']);
            $servName = htmlentities($_POST['serv']);
            $ville    = htmlentities($_POST['ville']);

            try {
                //*Search all service
                $dataServ = service_Service::service_searchAllServ();
                //*Select Dependence director
                $servDependence = service_Service::service_selectDependence();
                service_Service::service_modifyServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);
                afficherPageService($dataServ, $servDependence);
            } catch(ServiceException $ce) {
                afficherPageService($dataServ, $servDependence, $ce);
            }
        }
    }

    //*ARRAY SERVICE
    if ($_GET && $_GET["action"]=="showServ") {
        try {
           //*Search all service
            $dataServ = service_Service::service_searchAllServ();
            //*Select Dependence director
            $servDependence = service_Service::service_selectDependence();
            afficherPageService($dataServ, $servDependence);
        } catch(ServiceException $ce) {
            afficherPageService($dataServ, $servDependence, $ce);
        }
    }
?>