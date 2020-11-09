<?php 
    include_once '../Service/service_Service.php';

    //*ADD SERV
    if (isset($_POST['add'])){
        if (isset($_POST['idServ']) && !empty($_POST['idServ']) && 
            isset($_POST['serv']) && !empty($_POST['serv']) &&
            isset($_POST['ville'])&& !empty($_POST['ville'])) {  

            service_Employe::service_addServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);

        }
    }
    
    //*DELETE SERV
    if ($_GET && $_GET["action"]=="delete"){  
        if (!empty($_GET['idService'])) { 

            service_Employe::service_delServ();

        }
    }

    //*MODIFY SERV
    if (isset($_POST['modify'])){ 
        if (isset($_POST['idServ']) && isset($_POST['serv']) && isset($_POST['ville'])) {

            service_Employe::service_modifyServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);

        }
    }

?>