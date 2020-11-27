<?php 
    include_once '../class/Employe.php';
    include_once '../class/InterfaceDAO.php';
    require_once '../class/DaoSqlException.php';
    require_once '../Divers/ConnectBdd.php';

    class Employe_mysqli_DAO implements commonFunctionDAO{

        public function searchAll() :Array {
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

        public function delete(Int $id) :Void {
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

        public function modif(Object $EmployeModif) :Void {
            $id     = $EmployeModif->getId();
            $nom    = $EmployeModif->getNom();
            $prenom = $EmployeModif->getPrenom();
            $emp    = $EmployeModif->getEmp();
            $sup    = $EmployeModif->getSup();
            $emb    = $EmployeModif->datetimeToString($EmployeModif->getEmb());
            $sal    = $EmployeModif->getSal();
            $comm   = $EmployeModif->getComm();
            $noServ = $EmployeModif->getNoServ();
            $noProj = $EmployeModif->getNoProj();

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

        public function add(Object $EmployeAdd) :Void {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $nom    = $EmployeAdd->getNom();
            $prenom = $EmployeAdd->getPrenom();
            $emp    = $EmployeAdd->getEmp();
            $sup    = $EmployeAdd->getSup();
            $emb    = $EmployeAdd->datetimeToString($EmployeAdd->getEmb());
            $sal    = $EmployeAdd->getSal();
            $comm   = $EmployeAdd->getComm();
            $noServ = $EmployeAdd->getNoServ();
            $noProj = $EmployeAdd->getNoProj();

            //*TRAITEMENT AJOUT
            $dbServ = ConnectBdd();

            //*REQUETE SQL ADD
            $AddRequest = $dbServ->prepare("INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER(?),UPPER(?),?,?,?,?,?,?,?)");
            $AddRequest->bind_param("sssisiiii", $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj);

            //*VERIF REQUETE SQL
            try {
                $AddRequest->execute();
            } catch (DaoSqlException $e) {
                throw new DaoSqlException($e->getCode(), $e->getMessage());
            } finally {
                $dbServ->close();
            }
        }

        public function searchById(String $id) :?Array{
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

        public function selectSup() :Array {
            //*CONNECT DB
            $dbServ = ConnectBdd(); 

            //*SEARCH REQUEST
            $selectSupRequest = $dbServ->prepare("SELECT DISTINCT e.id FROM `employes` AS e INNER JOIN `employes` AS e1 WHERE e.id=e1.sup");
            $selectSupRequest->execute();
            $rs   = $selectSupRequest->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);

            //* Close connection
            $rs->free();
            $dbServ->close();

            return $data;
        }
    }
?>