<?php 
    include_once '../Controleur/controleur_Employe.php';
    include_once '../DAO/Employe_mysqli_DAO.php';

    class service_Employe {
        public static function service_addEmp($nom,$prenom,$emp,$sup,$emb,$sal,$comm,$noServ,$noProj) :Void {
            $employeAdd = new Employe();
            $employeAdd->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
            Employe_mysqli_DAO::addEmp($employeAdd);
        }

        public static function service_delEmp() :Void {
            Employe_mysqli_DAO::delEmp($_GET["id"]);  
        }

        public static function service_modifyEmp($id,$nom,$prenom,$emp,$sup,$emb,$sal,$comm,$noServ,$noProj) :Void {
            $employeModif = new Employe();
            $employeModif->setId($id)->setNom($nom)->setPrenom($prenom)->setEmp($emp)->setSup($sup)->setEmb($emb)->setSal($sal)->setComm($comm)->setNoServ($noServ)->setNoProj($noProj);
            Employe_mysqli_DAO::modifyEmp($employeModif);
        }

    }

?>