<?php
    include_once '../Service/service_Employe.php';
    include_once '../Presentation/presentation_Employe.php';

    //*ADD EMP
    if (isset($_POST['add'])) {
        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
            isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['sal']) && !empty($_POST['sal']) &&
            isset($_POST['comm']) && isset($_POST['noService']) && !empty($_POST['noService']) && isset($_POST['noProj']) && !empty($_POST['noProj'])) {

            service_Employe::service_addEmp($_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['sup'],$_POST['embauche'],$_POST['sal'],$_POST['comm'],$_POST['noService'],$_POST['noProj']);

        }
    }

    //*DELETE EMP
    if ($_GET && $_GET["action"]=="delete") {   
        if (!empty($_GET['id'])) {
            
            service_Employe::service_delEmp(); 
        
        }
    }

    //*MODIFY EMP
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
    function disabled($valueID) :?Bool{
        $data = service_Employe::service_selectSup();

        foreach ($data as $sup) {
            foreach ($sup as $nbSup) {
                if ($valueID == $nbSup) {
                    return true;
                }
            } 
        } 

        return null;

    }

    //*SEARCH ALL EMPLOYE
    function searchAllEMp() :Array {
        $data = service_Employe::service_searchAllEmp();
        return $data;
    }

    //*VERIF SI ADMIN
    function ifAdmin() :Bool {
        if ($_SESSION['tou'] == 'Administrateur') {
            return true;
        }
    }

    //*PRINT ARRAY
    function printEmployeArray() :Void{
        $dataEmp = searchAllEmp();
        $i = 1;
        foreach ($dataEmp as $value) {
            printTableRow($i);
            foreach ($value as $v) {
                printTableContent($v);
            }

            if (ifAdmin()) {
                printArrayButton($value["id"]);
            }
            echo"</tr>";
            $i++;
        }
    }

?>