<?php
    include_once '../Service/service_Employe.php';

    //*ADD SERV
    if (isset($_POST['add'])) {
        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
            isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['sal']) && !empty($_POST['sal']) &&
            isset($_POST['comm']) && isset($_POST['noService']) && !empty($_POST['noService']) && isset($_POST['noProj']) && !empty($_POST['noProj'])) {

            service_Employe::service_addEmp($_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],$_POST['embauche'],$_POST['sal'],$_POST['comm'],$_POST['noService'],$_POST['noProj']);

        }
    }

    //*DELETE SERV
    if ($_GET && $_GET["action"]=="delete") {   
        if (!empty($_GET['id'])) {
            
            service_Employe::service_delEmp(); 
        
        }
    }

    //*MODIFY SERV
    if (isset($_POST['modify'])) { 
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
                isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['sal']) && !empty($_POST['sal']) &&
                isset($_POST['comm']) && isset($_POST['noService']) && !empty($_POST['noService']) && isset($_POST['noProj']) && !empty($_POST['noProj'])) {

                service_Employe::service_modifyEmp($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],$_POST['embauche'],$_POST['sal'],$_POST['comm'],$_POST['noService'],$_POST['noProj']);
            
            }
        }   
    }

    //*DISABLED DELETE BUTTON
    function disabled($valueID) :Void {
        //TODO TRANSFORM REQUEST IN POO
        $dbServ = ConnectBdd();
        $noSup = "SELECT DISTINCT e.id FROM `employes` AS e INNER JOIN `employes` AS e1 WHERE e.id=e1.sup";
        $SqlRequest=mysqli_query($dbServ, $noSup);

        foreach ($SqlRequest as $sup) {
            foreach ($sup as $nbSup) {
                if ($valueID == $nbSup) {
                    echo 'isDisabled';
                }
            }
        }
    }

?>