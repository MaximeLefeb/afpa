<?php
    include_once '../class/Serv.php';
    include_once '../class/Interface.php';
    include_once '../Divers/ConnectBdd.php';

    class Service_mysqli_DAO implements commonFunction{
        
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

    }
?>
