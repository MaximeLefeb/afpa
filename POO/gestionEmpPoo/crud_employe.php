<?php 

    include_once 'class/Utilisateur.php';
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

    function addEmp(String $nom, String $prenom, String $emp, Int $sup, String $emb, Float $sal, Float $comm, Int $noServ, Int $noProj) :Void {
        //* TRAITEMENT AJOUT
        $dbServ = ConnectBdd();
        
        if($comm == '0')$comm = 'NULL';
        if($noProj == "Aucun")$noProj = 'NULL';

        //*REQUETE SQL ADD
        $AddRequest = $dbServ->prepare("INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER(?),UPPER(?),?,?,?,?,?,?,?)");
        $AddRequest->bind_param("sssisiiii", $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj);
        
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

    function modifyEmp(String $nom, String $prenom, String $emp, Int $sup, String $emb, Float $sal, Float $comm, Int $noServ, Int $noProj, Int $id) :Void {
        //* TRAITEMENT MODIFICATION
        $dbServ=ConnectBdd();
        
        //*REQUETE SQL MODIFY
        $ModiFyRequest = $dbServ->prepare("UPDATE `employes` SET Nom=UPPER(?), Prenom=UPPER(?), Emploi=?, Sup=?, Embauche=?, Sal=?, Comm=?, NoService=?, NoProj=? WHERE id = ?");
        $ModiFyRequest->bind_param("sssisiiiii", $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj, $id);

        //*VERIF REQUETE SQL
        if ($ModiFyRequest->execute()) {
            ?><script>alert("Modif employes ok");</script><?php
        } else {
            ?><script>alert("Erreur lors de la modifcation d'employes");</script><?php
        }

        $dbServ->close();
    }
?>