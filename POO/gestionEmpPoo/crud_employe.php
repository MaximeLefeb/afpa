<?php 

    include_once 'class/Employe.php';
    include_once 'ConnectBdd.php';

    //! --------------------------------------------------------- TABLE EMPLOYES -----------------------------------------------------------------

    function searchAllEmp() :?Array {
        //* TRAITEMENT AJOUT
        $dbServ=ConnectBdd();
        $requestSelectEmp = $dbServ->prepare("SELECT * FROM  employes");
        $requestSelectEmp->execute();
        $rs   = $requestSelectEmp->get_result();
        $dataEmp = $rs->fetch_all(MYSQLI_ASSOC);

        $rs->free();
        $dbServ->close();

        return $dataEmp;
    }

    function addEmp(Employe $EmployeAdd) :Void {
        $nom    = $EmployeAdd->getNom();
        $prenom = $EmployeAdd->getPrenom();
        $emp    = $EmployeAdd->getEmp();
        $sup    = $EmployeAdd->getSup();
        $emb    = $EmployeAdd->getEmb();
        $sal    = $EmployeAdd->getSal();
        $comm   = $EmployeAdd->getComm();
        $noServ = $EmployeAdd->getNoServ();
        $noProj = $EmployeAdd->getNoProj();
        $embFormat = $emb->format('Y-m-d');

        //* TRAITEMENT AJOUT
        $dbServ = ConnectBdd();

        //*REQUETE SQL ADD
        $AddRequest = $dbServ->prepare("INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER(?),UPPER(?),?,?,?,?,?,?,?)");
        $AddRequest->bind_param("sssisiiii", $nom, $prenom, $emp, $sup, $embFormat, $sal, $comm, $noServ, $noProj);
        
        //*VERIF REQUETE SQL
        if($AddRequest->execute()){
            ?><script>alert("Ajout employes ok");</script><?php
        }else{
            ?><script>alert("Erreur lors de l'ajout d'employes en base de données");</script><?php
        }

        $dbServ->close();
    }

    function delEmp(Int $id) :Void {
        //* TRAITEMENT SUPRESSION
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL DEL
        $DeleteRequest = $dbServ->prepare("DELETE FROM employes WHERE id = ?");
        $DeleteRequest->bind_param("i", $id);

        //*VERIF REQUETE SQL
        if ($DeleteRequest->execute()) {
            ?><script>alert("Delete employes ok");</script><?php
        } else {
            ?><script>alert("Erreur lors de la suppression d'employes");</script><?php
        }
        
        $dbServ->close();
    }

    function modifyEmp(Employe $EmployeModif) :Void {
        $id     = $EmployeModif->getId();
        $nom    = $EmployeModif->getNom();
        $prenom = $EmployeModif->getPrenom();
        $emp    = $EmployeModif->getEmp();
        $sup    = $EmployeModif->getSup();
        $emb    = $EmployeModif->getEmb();
        $sal    = $EmployeModif->getSal();
        $comm   = $EmployeModif->getComm();
        $noServ = $EmployeModif->getNoServ();
        $noProj = $EmployeModif->getNoProj();
        $embFormat = $emb->format('Y-m-d');

        //* TRAITEMENT MODIFICATION
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL MODIFY
        $ModiFyRequest = $dbServ->prepare("UPDATE `employes` SET Nom=UPPER(?), Prenom=UPPER(?), Emploi=?, Sup=?, Embauche=?, Sal=?, Comm=?, NoService=?, NoProj=? WHERE id = ?");
        $ModiFyRequest->bind_param("sssisiiiii", $nom, $prenom, $emp, $sup, $embFormat, $sal, $comm, $noServ, $noProj, $id);

        //*VERIF REQUETE SQL
        if ($ModiFyRequest->execute()) {
            ?><script>alert("Modif employes ok");</script><?php
        } else {
            ?><script>alert("Erreur lors de la modifcation d'employes");</script><?php
        }

        $dbServ->close();
    }

    function searchEmp(Int $id) :?Array{
        //*CONNECT DB
        $dbServ = ConnectBdd();

        //*SEARCH REQUEST
        $selectRequest = $dbServ->prepare("SELECT * FROM employes WHERE id = ?");
        $selectRequest->bind_param("i", $id);
        $selectRequest->execute();
        $rs   = $selectRequest->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);

        //* Close connection
        $rs->free();
        $dbServ->close();

        return $data;
    }
    
?>