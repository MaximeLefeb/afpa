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
                                               
                $nom    = htmlentities($_POST['nom']);                    
                $prenom = htmlentities($_POST['prenom']);                    
                $emp    = htmlentities($_POST['emploi']);                    
                $sup    = htmlentities($_POST['sup']);                    
                $emb    = htmlentities($_POST['embauche']);                    
                $sal    = htmlentities($_POST['sal']);                    
                $comm   = htmlentities($_POST['comm']);    
                $noServ = htmlentities($_POST['noService']);                    
                $noProj = htmlentities($_POST['noProj']);

            try {
                //*Search all employe
                $data = service_Employe::service_searchAllEmp();
                //*Select Dependence director
                $ListSup = service_Employe::service_selectSup();
                service_Employe::service_addEmp($nom, $prenom, $emp, $sup, empty($emb) ? NULL : $emb, $sal , empty($comm) ? NULL : $comm, $noServ, $noProj == NULL ? NULL : intval($noProj));
                afficherPageEmploye($data, $ListSup);
            } catch(ServiceException $ce) {
                afficherPageEmploye($data, $ListSup, $ce);
            }
        }
    }

    //*MODIFY EMP
    if (isset($_POST['modify'])) { 
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['sup']) && !empty($_POST['sup'])
            && isset($_POST['sal']) && !empty($_POST['sal']) && isset($_POST['noService']) && !empty($_POST['noService'])) {

                $id     = htmlentities($_POST['id']);                                
                $nom    = htmlentities($_POST['nom']);                    
                $prenom = htmlentities($_POST['prenom']);                    
                $emp    = htmlentities($_POST['emploi']);                    
                $sup    = htmlentities($_POST['sup']);                    
                $emb    = htmlentities($_POST['embauche']);                    
                $sal    = htmlentities($_POST['sal']);                    
                $comm   = htmlentities($_POST['comm']);    
                $noServ = htmlentities($_POST['noService']);                    
                $noProj = htmlentities($_POST['noProj']);

                try {
                    //*Search all employe
                    $data = service_Employe::service_searchAllEmp();
                    //*Select Dependence director
                    $ListSup = service_Employe::service_selectSup();
                    service_Employe::service_modifyEmp($id, $nom, $prenom, $emp, $sup, empty($emb) ? NULL : $emb, $sal, empty($comm) ? NULL : $comm, $noServ, $_noProj == NULL ? NULL : intval($noProj));
                    afficherPageEmploye($data, $ListSup);
                } catch(ServiceException $ce) {
                    afficherPageEmploye($data, $ListSup, $ce);
                }  
            }
        }
    }
    
    if (isset($_GET)) {
        if ($_GET["action"] == "delete") {   
            if (!empty($_GET['id'])) {
                try {
                    //*Search all employe
                    $data = service_Employe::service_searchAllEmp();
                    //*Select Dependence director
                    $ListSup = service_Employe::service_selectSup();
                    service_Employe::service_delEmp();
                    afficherPageEmploye($data, $ListSup); 
                } catch(ServiceException $ce) {
                    afficherPageEmploye($data, $ListSup, $ce);
                }    
            }
        } else if ($_GET["action"]=="showEmp") {
            try {
                //*Search all employe
                $data = service_Employe::service_searchAllEmp();
                //*Select Dependence director
                $ListSup = service_Employe::service_selectSup();
                afficherPageEmploye($data, $ListSup);
            } catch(ServiceException $ce) {
                afficherPageEmploye($data, $ListSup, $ce);
            }  
        }
    }
?>