<?php
    include_once '../class/Serv.php';
    include_once '../class/InterfaceDAO.php';
    require_once '../class/DaoSqlException.php';
    require_once '../Divers/ConnectBdd.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
            try {
                $DeleteRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            } finally {
                $dbServ->close();
            }
        }

        public function delete(Int $idServ) :Void {
            //* TRAITEMENT SUPRESSION
            $dbServ=ConnectBdd();
            //*REQUETE SQL DEL
            $DeleteRequest = $dbServ->prepare("DELETE FROM `serv` WHERE idService = ?");
            $DeleteRequest->bind_param("i", $idServ);

            //*VERIF REQUETE SQL
            try {
                $AddRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            } finally {
                $dbServ->close();
            }
        }

        public function modif(Object $ServiceModif) :Void {
            $idServ    = $ServiceModif->getIdService();
            $nomServ   = $ServiceModif->getService();
            $villeServ = $ServiceModif->getVille();

            //* TRAITEMENT MODIFICATION
            $dbServ    = ConnectBdd();
            //*REQUETE SQL MODIFY
            $ModiFyRequest = $dbServ->prepare("UPDATE `serv` SET idService=?, service =UPPER(?), ville=UPPER(?) WHERE idService = ?");
            $ModiFyRequest->bind_param("issi", $idServ, $nomServ, $villeServ, $idServ);
            
            //*VERIF REQUETE SQL
            try {
                $ModiFyRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            } finally {
                $dbServ->close();
            }
        }

        public function searchAll() :Array {
            //* CONNECT DB
            $dbServ=ConnectBdd();
            //* SEARCH BDD
            $requestSelectServ = $dbServ->prepare("SELECT * FROM serv");
        
            try {
                $requestSelectServ->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            }

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
            
            try {
                $selectRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            }

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
    
            try {
                $selectDependanceRequest->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            }

            $rs   = $selectDependanceRequest->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
 
            //* Close connection
            $rs->free();
            $dbServ->close();
 
            return $data;

        }
    }
?>
