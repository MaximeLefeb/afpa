<?php 
    session_start();
    include_once '../Service/service_Service.php';
    
    //*SI NON CONNECTÉ
    if (!$_SESSION) {
        header('location: formLogin.php');
    }

    //*ADD SERV
    if (isset($_POST['add'])){
        if (isset($_POST['idServ']) && !empty($_POST['idServ']) && 
            isset($_POST['serv']) && !empty($_POST['serv']) &&
            isset($_POST['ville'])&& !empty($_POST['ville'])) {  

            service_Service::service_addServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);

        }
    }
    
    //*DELETE SERV
    if ($_GET && $_GET["action"]=="delete"){  
        if (!empty($_GET['idService'])) { 

            service_Service::service_delServ();

        }
    }

    //*MODIFY SERV
    if (isset($_POST['modify'])){ 
        if (isset($_POST['idServ']) && isset($_POST['serv']) && isset($_POST['ville'])) {

            service_Service::service_modifyServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);

        }
    }

    //*SEARCH ALL SERVICE
    function searchAllServ() :Array {
        $dataServ = service_Service::service_searchAllServ();
        return $dataServ;
    }

    //*VERIF SI ADMIN
    function ifAdmin() :Bool {
        if ($_SESSION['tou'] == 'Administrateur') {
            return true;
        }
    }

    //*PRINT SERVICE ARRAY
    function printServiceArray() :Void {
        $dataServ = searchAllServ();
        $i = 1;
        foreach ($dataServ as $key => $value) {
            printServTableRow($i, $value);
            $i++;
        }
    }

    //*ARRAY SERVICE
    if ($_GET && $_GET["action"]=="showServ") {
        require_once '../Presentation/presentation_Service.php';
    }


?>