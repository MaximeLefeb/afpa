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

            service_Service::service_addServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);
            afficherPageService(searchAllServ());
            
        }
    }
    
    //*DELETE SERV
    if ($_GET && $_GET["action"]=="delete") {  
        if (!empty($_GET['idService'])) { 

            service_Service::service_delServ();
            afficherPageService(searchAllServ());

        }
    }

    //*MODIFY SERV
    if (isset($_POST['modify'])) { 
        if (isset($_POST['idServ']) && isset($_POST['serv']) && isset($_POST['ville'])) {

            service_Service::service_modifyServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);
            afficherPageService(searchAllServ());

        }
    }

    //*ARRAY SERVICE
    if ($_GET && $_GET["action"]=="showServ") {
        afficherPageService(searchAllServ());
    }

    //*SEARCH ALL SERVICE
    function searchAllServ() :Array {
        $dataServ = service_Service::service_searchAllServ();
        return $dataServ;
    }

    //*SEARCH ONE SERVICE
    function searchOneEmp(String $idServ) :Service {
        $Serv = service_Service::service_searchServ($idServ);
        return $Serv;
    }
?>