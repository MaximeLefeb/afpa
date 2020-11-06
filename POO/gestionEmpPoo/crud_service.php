<?php

    include_once 'class/Utilisateur.php';
    include_once 'ConnectBdd.php';

    //! --------------------------------------------------------- TABLE SERVICES ----------------------------------------------------------------
    
    //TODO 1 argument Type service
    function addServ(Int $idServ, String $Service, String $ville) :Void {
        //* TRAITEMENT AJOUT
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL ADD
        $AddRequest = $dbServ->prepare("INSERT INTO serv(`idService`,`Service`, `Ville`) VALUES (?,UPPER(?),UPPER(?))");
        $AddRequest->bind_param("iss", $idServ, $Service, $ville);
        
        //*VERIF REQUETE SQL
        if($AddRequest->execute()){
            ?><script>alert("Ajout service ok");</script><?php
        }else{
            ?><script>alert("Erreur lors de l'ajout de service en base de données");</script><?php
        }

        $dbServ->close();
    }

    function delServ(Int $idServ) :Void {
        //* TRAITEMENT SUPRESSION
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL DEL
        $DeleteRequest = $dbServ->prepare("DELETE FROM `serv` WHERE idService = ?");
        $DeleteRequest->bind_param("i", $idServ);

        //*VERIF REQUETE SQL
        if ($DeleteRequest->execute()) {
            ?><script>alert("Delete ok");</script><?php
        }else{
            ?><script>alert("Erreur lors de la suppression");</script><?php
        }

        $dbServ->close();
    }

    function modifyServ(Int $idServ, String $Service, String $ville) :Void {
        //* TRAITEMENT MODIFICATION
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL MODIFY
        $ModiFyRequest = $dbServ->prepare("UPDATE `serv` SET idService=?, service =UPPER(?), ville=UPPER(?) WHERE idService = ?");
        $ModiFyRequest->bind_param("issi", $Service->getIdService(), $Service->getSerivce(), $Service->getVille(), $Service->getIdService());
        
        //*VERIF REQUETE SQL
        if ($ModiFyRequest->execute()) {
            ?><script>alert("Modif ok");</script><?php
        }else{
            ?><script>alert("Echec de la modif");</script><?php
        }

        $dbServ->close();
    }

    function searchAllServ() :?Array {
        //* SEARCH BDD
        $dbServ=ConnectBdd();
        $requestSelectServ = $dbServ->prepare("SELECT * FROM serv");
        $requestSelectServ->execute(); 
        $rs   = $requestSelectServ->get_result();
        $dataServ = $rs->fetch_all(MYSQLI_ASSOC);

        $rs->free();
        $dbServ->close();

        return $dataServ;
    }

?>
