<?php 
    include_once '../DAO/Employe_mysqli_DAO.php';
    require_once '../Class/ServiceException.php';

    class service_Employe {
        public static function service_addEmp(String $nom,String $prenom,String $emp,Int $sup, ?String $emb, Float $sal, ?Float $comm, Int $noServ, ?Int $noProj) :Void {
            $employeAdd = new Employe();
            $employeAdd->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
           
            try {
                Employe_mysqli_DAO::add($employeAdd);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_delEmp() :Void { 
            try {    
                Employe_mysqli_DAO::delete($_GET["id"]);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_modifyEmp(Int $id, String $nom, String $prenom, String $emp, Int $sup, ?String $emb, Float $sal, ?Float $comm, Int $noServ, ?Int $noProj) :Void {
            $employeModif = new Employe();
            $employeModif->setId($id)->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
            
            try {
                Employe_mysqli_DAO::modif($_GET["id"]);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_selectSup() :Array  {
            try {
                $data = Employe_mysqli_DAO::selectSup();
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }

            $dataObjectSup = array();

            foreach ($data as $value) {
                $Superieur = new Employe();
                $Superieur->setId($value["id"]);
                array_push($dataObjectSup, $Superieur);
            }

            return $dataObjectSup;
        }

        public static function service_searchEmp(String $id) :?Employe {
            try {
                $data = Employe_mysqli_DAO::searchById($id);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        
            $employe = new Employe();
            $employe->setId($data["id"])->setNom($data["Nom"])->setPrenom($data["Prenom"])->setEmp($data["Emploi"])->setSup($data["Sup"])->setEmb($data["Embauche"])->setSal($data["Sal"])->setComm($data["Comm"])->setNoServ($data["NoService"])->setNoProj($data["NoProj"]);

            return $employe;
        }

        public static function service_searchAllEmp() :Array {
            try {
                $data = Employe_mysqli_DAO::searchAll();
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
            
            $dataObject = array();

            foreach ($data as $value) {
                $employe = new Employe();
                $employe->setId($value["id"])->setNom($value["Nom"])->setPrenom($value["Prenom"])->setEmp($value["Emploi"])->setSup($value["Sup"])->setEmb($value["Embauche"])->setSal($value["Sal"])->setComm($value["Comm"])->setNoServ($value["NoService"])->setNoProj($value["NoProj"]);
                array_push($dataObject, $employe);
            }

            return $dataObject;
        }
    }
?>