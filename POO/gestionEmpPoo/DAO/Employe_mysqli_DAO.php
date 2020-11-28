<?php 
    include_once '../class/Employe.php';
    include_once '../class/InterfaceDAO.php';
    require_once '../class/DaoSqlException.php';
    require_once '../Divers/ConnectBdd.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class Employe_mysqli_DAO implements commonFunctionDAO{

        public function searchAll() :Array {
            //* CONNECT DB
            $db=ConnectBdd();

            //* REQUETE SQL SEARCH ALL
            $requestSelectEmp = $db->prepare("SELECT * FROM  employes");

            //TODO
            Self::tryExecuteGetExcept($requestSelectEmp, $db);
            $rs   = $requestSelectEmp->get_result();
            $dataEmp = $rs->fetch_all(MYSQLI_ASSOC);

            $rs->free();

            return $dataEmp;
        }

        public function delete(Int $id) :Void {
            //* CONNECT DB
            $db = ConnectBdd();
            
            //* REQUETE SQL DEL
            $DeleteRequest = $db->prepare("DELETE FROM employes WHERE id = ?");
            $DeleteRequest->bind_param("i", $id);

            //*VERIF REQUETE SQL
            Self::tryExecuteGetExcept($DeleteRequest, $db);
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

            //* CONNECT DB
            $db = ConnectBdd();
            
            //*REQUETE SQL MODIFY
            $ModiFyRequest = $db->prepare("UPDATE `employes` SET Nom=UPPER(?), Prenom=UPPER(?), Emploi=?, Sup=?, Embauche=?, Sal=?, Comm=?, NoService=?, NoProj=? WHERE id = ?");
            $ModiFyRequest->bind_param("sssisiiiii", $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj, $id);

            //*VERIF REQUETE SQL
            Self::tryExecuteGetExcept($ModiFyRequest, $db);
        }

        public function add(Object $EmployeAdd) :Void {

            $nom    = $EmployeAdd->getNom();
            $prenom = $EmployeAdd->getPrenom();
            $emp    = $EmployeAdd->getEmp();
            $sup    = $EmployeAdd->getSup();
            $emb    = $EmployeAdd->datetimeToString($EmployeAdd->getEmb());
            $sal    = $EmployeAdd->getSal();
            $comm   = $EmployeAdd->getComm();
            $noServ = $EmployeAdd->getNoServ();
            $noProj = $EmployeAdd->getNoProj();

            //* CONNECT DB
            $db = ConnectBdd();

            //* REQUETE SQL ADD
            $AddRequest = $db->prepare("INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER(?),UPPER(?),?,?,?,?,?,?,?)");
            $AddRequest->bind_param("sssisiiii", $nom, $prenom, $emp, $sup, $emb, $sal, $comm, $noServ, $noProj);

            //*VERIF REQUETE SQL
            Self::tryExecuteGetExcept($AddRequest, $db);
        }

        public function searchById(String $id) :?Array{
            //* CONNECT DB
            $db = ConnectBdd();

            //* REQUETE SQL SEARCH BY ID
            $selectRequest = $db->prepare("SELECT * FROM employes WHERE id = ?");
            $selectRequest->bind_param("i", $id);

            //TODO
            Self::tryExecuteGetExcept($selectRequest, $db);
            $rs   = $selectRequest->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);

            //* Close connection
            $rs->free();

            return $data;
        }

        public function selectSup() :Array {
            //* CONNECT DB
            $db = ConnectBdd(); 

            //* REQUETE SQL SEARCH SUPERIEUR 
            $selectSupRequest = $db->prepare("SELECT DISTINCT e.id FROM `employes` AS e INNER JOIN `employes` AS e1 WHERE e.id=e1.sup");

            //TODO
            Self::tryExecuteGetExcept($selectSupRequest, $db);
            $rs   = $selectSupRequest->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);

            //* Close connection
            $rs->free();

            return $data;
        }

        public static function tryExecuteGetExcept($request, $db, $toReturn = NULL) {
            try {
                $request->execute();
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            } finally {
                //? PAS DE FINNALY ?
                $db->close();
                
                /*                 
                if ($toReturn) {
                    #code...
                } 
                */
            }
        }
    }
?>