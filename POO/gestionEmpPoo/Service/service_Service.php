<?php 
    include_once '../Controleur/controleur_Employe.php';
    include_once '../DAO/Service_mysqli_DAO.php';

    class service_Service {
        public static function service_addServ($idServ,$serv,$ville) :Void {
            $Service = new Service();
            $Service->setIdService($idServ)->setService($serv)->setVille($ville);
            Service_mysqli_DAO::addServ($Service);
        }

        public static function service_delServ() :Void {
            Service_mysqli_DAO::delServ($_GET['idService']);
        }

        public static function service_modifyServ($idServ,$serv,$ville) :Void {
            $ServiceModified = new Service();
            $ServiceModified->setIdService($idServ)->setService($serv)->setVille($ville);
            Service_mysqli_DAO::modifyServ($ServiceModified);
        }
    }
?>