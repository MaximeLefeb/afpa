<?php 
    include_once '../DAO/Employe_mysqli_DAO.php';

    class service_Employe {
        public static function service_addEmp(String $nom,String $prenom,String $emp,Int $sup, String $emb, Float $sal, Float $comm, Int $noServ, Int $noProj) :Void {
            $employeAdd = new Employe();
            $employeAdd->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
            Employe_mysqli_DAO::addEmp($employeAdd);
        }

        public static function service_delEmp() :Void {
            Employe_mysqli_DAO::delEmp($_GET["id"]);  
        }

        public static function service_modifyEmp(Int $id, String $nom, String $prenom, String $emp, Int $sup, String $emb, Float $sal, Float $comm, Int $noServ, Int $noProj) :Void {
            $employeModif = new Employe();
            $employeModif->setId($id)->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
            Employe_mysqli_DAO::modifyEmp($employeModif);
        }

        public static function service_selectSup() :Array  {
            $data = Employe_mysqli_DAO::selectSup();
            return $data;
        }

        public static function service_searchEmp(String $id) :?Employe {
            $data = Employe_mysqli_DAO::searchEmp($id);
            $employe = new Employe();
            $employe->setId($data["id"])->setNom($data["Nom"])->setPrenom($data["Prenom"])->setEmp($data["Emploi"])->setSup($data["Sup"])->setEmb($data["Embauche"])->setSal($data["Sal"])->setComm($data["Comm"])->setNoServ($data["NoService"])->setNoProj($data["NoProj"]);

            return $employe;
        }

        public static function service_searchAllEmp() :Array {
            $data = Employe_mysqli_DAO::searchAllEmp();
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