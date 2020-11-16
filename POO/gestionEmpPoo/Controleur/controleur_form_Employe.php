<?php 
    include_once '../Service/service_Employe.php';
    include_once '../Presentation/form_add_employe.php';
    session_start();

    if (!$_SESSION) {
        header('location: ../Controleur/controleur_formSignUp.php');
    }

    if (isset($_GET)) {
        if ($_GET['action'] == 'ajouter') {
            afficherPageAjout();
        }
        
        if ($_GET['action'] == 'modify') {
            $Employe = searchOneEmp($_GET['id']);
            $id      = $Employe->getId();
            $nom     = $Employe->getNom();
            $prenom  = $Employe->getPrenom();
            $emp     = $Employe->getEmp();
            $sup     = $Employe->getSup();
            $emb     = $Employe->datetimeToString($Employe->getEmb());
            $sal     = $Employe->getSal();
            $comm    = $Employe->getComm();
            $noServ  = $Employe->getNoServ();
            $noProj  = $Employe->getNoProj();
            afficherPageModif($id, $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj);
        }
    }

    //*SEARCH ONE EMPLOYE
    function searchOneEmp(String $id) :Employe {
        $Employe = service_Employe::service_searchEmp($id);
        return $Employe;
    }
 
?>