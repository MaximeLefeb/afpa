<?php
    include_once '../Service/service_Employe.php';
    include_once '../Presentation/presentation_Employe.php';
    session_start();

    //*SI NON CONNECTÉ
    if (!$_SESSION) {
        header('location: ../Controleur/controleur_formSignUp.php');
    }

    //*ADD EMP
    //TODO CATCH
    if (isset($_POST['add'])) {
        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
            isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['sal']) && !empty($_POST['sal']) && isset($_POST['noService']) && !empty($_POST['noService'])) {
            
            try {
                service_Employe::service_addEmp($_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],$_POST['embauche'],$_POST['sal'],empty($_POST['comm']) ? NULL : $_POST['comm'],$_POST['noService'],$_POST['noProj'] == NULL ? NULL : intval($_POST['noProj']));
            } catch() {
                echo 'Error ' . $e->getCode() . ' -> ' . $e->getMessage();
            } finally {
                afficherPageEmploye(searchAllEMp(), selectSup());
            }
        }
    }

    //*DELETE EMP
    if ($_GET && $_GET["action"] == "delete") {   
        if (!empty($_GET['id'])) {
            
            service_Employe::service_delEmp(); 
            afficherPageEmploye(searchAllEMp(), selectSup());
        }
    }

    //*MODIFY EMP
    if (isset($_POST['modify'])) { 
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['sup']) && !empty($_POST['sup'])
             && isset($_POST['sal']) && !empty($_POST['sal']) && isset($_POST['noService']) && !empty($_POST['noService'])) {
    
                service_Employe::service_modifyEmp($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],empty($_POST['embauche']) ? NULL : $_POST['embauche'], $_POST['sal'],empty($_POST['comm']) ? NULL : $_POST['comm'], $_POST['noService'], $_POST['noProj'] == NULL ? NULL : intval($_POST['noProj']));
                afficherPageEmploye(searchAllEMp(), selectSup());
            }
        }
    }

    //*ARRAY EMPLOYE
    if ($_GET && $_GET["action"]=="showEmp") {
        afficherPageEmploye(searchAllEMp(), selectSup());
    }

    //*SEARCH ALL EMPLOYE
    function searchAllEMp() :Array {
        $data = service_Employe::service_searchAllEmp();
        return $data;
    }

    function selectSup() :Array {
        $ListSup = service_Employe::service_selectSup();
        return $ListSup;
    }
    
?>