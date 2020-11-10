<?php 
    include_once '../Controleur/controleur_Employe.php';
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

        public static function service_searchAllEmp() :Array {
            $data = Employe_mysqli_DAO::searchAllEmp();
            return $data;
        }
    }

?>