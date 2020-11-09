<?php
    include_once '../class/Serv.php';
    include_once '../ConnectBdd.php';

    class Service_mysqli_DAO {

        public static function addServ(Service $ServiceAdd) :Void {
            $idServ    = $ServiceAdd->getIdService();
            $nomServ   = $ServiceAdd->getSerivce();
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

        public static function delServ(Int $idServ) :Void {
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

        public static function modifyServ(Service $ServiceModif) :Void {
            //* TRAITEMENT MODIFICATION
            $dbServ=ConnectBdd();

            $idServ    = $ServiceModif->getIdService();
            $nomServ   = $ServiceModif->getSerivce();
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

        public static function searchAllServ() :?Array {
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
        
        public static function searchServ(Int $idServ) :?Array {
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
