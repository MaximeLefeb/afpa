<?php
    include_once '../class/Serv.php';
    include_once '../class/InterfaceDAO.php';
    require_once '../class/DaoSqlException.php';
    require_once '../Divers/ConnectBdd.php';

    class Service_mysqli_DAO implements commonFunctionDAO{
        
        public function add(Object $ServiceAdd) :Void {
            $idServ    = $ServiceAdd->getIdService();
            $nomServ   = $ServiceAdd->getService();
            $villeServ = $ServiceAdd->getVille();

            //* TRAITEMENT AJOUT
            $dbServ=ConnectBdd();
            
            //*REQUETE SQL ADD
            $AddRequest = $dbServ->prepare("INSERT INTO serv(`idService`,`Service`, `Ville`) VALUES (?,UPPER(?),UPPER(?))");
            $AddRequest->bind_param("iss", $idServ, $nomServ, $villeServ);
            
            //*VERIF REQUETE SQL
            if($AddRequest->execute()){
                ?><script>alert("Ajout service ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de l'ajout de service en base de données");</script><?php
            }

            $dbServ->close();
        }

        public function delete(Int $idServ) :Void {
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

        public function modif(Object $ServiceModif) :Void {
            //* TRAITEMENT MODIFICATION
            $dbServ=ConnectBdd();

            $idServ    = $ServiceModif->getIdService();
            $nomServ   = $ServiceModif->getService();
            $villeServ = $ServiceModif->getVille();
            
            //*REQUETE SQL MODIFY
            $ModiFyRequest = $dbServ->prepare("UPDATE `serv` SET idService=?, service =UPPER(?), ville=UPPER(?) WHERE idService = ?");
            $ModiFyRequest->bind_param("issi", $idServ, $nomServ, $villeServ, $idServ);
            
            //*VERIF REQUETE SQL
            if ($ModiFyRequest->execute()) {
                ?><script>alert("Modif service ok");</script><?php
            }else{
                ?><script>alert("Echec de la modif");</script><?php
            }

            $dbServ->close();
        }

        public function searchAll() :Array {
            //* CONNECT DB
            $dbServ=ConnectBdd();

            //* SEARCH BDD
            $requestSelectServ = $dbServ->prepare("SELECT * FROM serv");
            $requestSelectServ->execute(); 
            $rs   = $requestSelectServ->get_result();
            $dataServ = $rs->fetch_all(MYSQLI_ASSOC);

            //* CLOSE DB
            $rs->free();
            $dbServ->close();

            return $dataServ;
        }
        
        public function searchById(String $idServ) :?Array {
            //* CONNECT DB
            $dbServ = ConnectBdd();

            //* SEARCH BDD
            $selectRequest = $dbServ->prepare("SELECT * FROM serv WHERE idService = ?");
            $selectRequest->bind_param("i", $idServ);
            $selectRequest->execute();
            $rs   = $selectRequest->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);

            //* CLOSE DB
            $rs->free();
            $dbServ->close();

            return $data;
        }

        public function selectDependence() :Array {
            //* CONNECT DB
            $dbServ = ConnectBdd();

            //*SEARCH REQUEST
            $selectDependanceRequest = $dbServ->prepare("SELECT DISTINCT s.idService FROM `serv` AS s INNER JOIN `employes` AS e WHERE e.NoService = s.idService");
            $selectDependanceRequest->execute();
            $rs   = $selectDependanceRequest->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
 
            //* Close connection
            $rs->free();
            $dbServ->close();
 
            return $data;

        }
    }
?>
