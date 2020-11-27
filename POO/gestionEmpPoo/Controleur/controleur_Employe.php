<?php
    include_once '../Service/service_Employe.php';
    include_once '../Presentation/presentation_Employe.php';
    session_start();

    //*SI NON CONNECTÉ
    if (!$_SESSION) {
        header('location: ../Controleur/controleur_formSignUp.php');
    }

    //*ADD EMP
    if (isset($_POST['add'])) {
        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['sup']) && !empty($_POST['sup']) 
            && isset($_POST['sal']) && !empty($_POST['sal']) && isset($_POST['noService']) && !empty($_POST['noService'])) {
            
            //*Search all employe
            $data = service_Employe::service_searchAllEmp();
            //*Select Dependence director
            $ListSup = service_Employe::service_selectSup();

            try {
                service_Employe::service_addEmp($_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],$_POST['embauche'],$_POST['sal'],empty($_POST['comm']) ? NULL : $_POST['comm'],$_POST['noService'],$_POST['noProj'] == NULL ? NULL : intval($_POST['noProj']));
                afficherPageEmploye($data, $ListSup);
            } catch(ServiceAddException $ce) {
                throw new ServiceAddException($ce->getCode(), $ce->getMessage());
                afficherPageEmploye($data, $ListSup, $ce);
            }
        }
    }

    //*DELETE EMP
    if ($_GET && $_GET["action"] == "delete") {   
        if (!empty($_GET['id'])) {

             //*Search all employe
             $data = service_Employe::service_searchAllEmp();
             //*Select Dependence director
             $ListSup = service_Employe::service_selectSup();
            
            service_Employe::service_delEmp(); 
            afficherPageEmploye($data, $ListSup);
        }
    }

    //*MODIFY EMP
    if (isset($_POST['modify'])) { 
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['sup']) && !empty($_POST['sup'])
                && isset($_POST['sal']) && !empty($_POST['sal']) && isset($_POST['noService']) && !empty($_POST['noService'])) {

                //*Search all employe
                $data = service_Employe::service_searchAllEmp();
                //*Select Dependence director
                $ListSup = service_Employe::service_selectSup();
        
                service_Employe::service_modifyEmp($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],empty($_POST['embauche']) ? NULL : $_POST['embauche'], $_POST['sal'],empty($_POST['comm']) ? NULL : $_POST['comm'], $_POST['noService'], $_POST['noProj'] == NULL ? NULL : intval($_POST['noProj']));
                afficherPageEmploye($data, $ListSup);
            }
        }
    }

    //*ARRAY EMPLOYE
    if ($_GET && $_GET["action"]=="showEmp") {
        //*Search all employe
        $data = service_Employe::service_searchAllEmp();
        //*Select Dependence director
        $ListSup = service_Employe::service_selectSup();

        afficherPageEmploye($data, $ListSup);
    }
?>