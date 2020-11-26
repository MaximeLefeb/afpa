<?php 
    include_once '../DAO/Service_mysqli_DAO.php';

    class service_Service {
        public static function service_addServ($idServ,$serv,$ville) :Void {
            $Service = new Service();
            $Service->setIdService($idServ)->setService($serv)->setVille($ville);
            Service_mysqli_DAO::add($Service);
        }

        public static function service_delServ() :Void {
            Service_mysqli_DAO::delete($_GET['idService']);
        }

        public static function service_modifyServ($idServ,$serv,$ville) :Void {
            $ServiceModified = new Service();
            $ServiceModified->setIdService($idServ)->setService($serv)->setVille($ville);
            Service_mysqli_DAO::modif($ServiceModified);
        }

        public static function service_searchAllServ() :Array {
            $dataServ = Service_mysqli_DAO::searchAll();
            $dataObject = array();

            foreach ($dataServ as $value) {
                $Serv = new Service();
                $Serv->setIdService($value["idService"])->setService($value["Service"])->setVille($value["Ville"]);
                array_push($dataObject, $Serv);
            }

            return $dataObject;
        }

        public static function service_searchServ(String $idServ) :?Service {
            $data = Service_mysqli_DAO::searchById($idServ);
            $Serv = new Service();
            $Serv->setIdService($data["idService"])->setService($data["Service"])->setVille($data["Ville"]);

            return $Serv;

        }

        public static function service_selectDependence() :Array  {
            $data = Employe_mysqli_DAO::selectDependence();
            $dataObjectServ = array();

            foreach ($data as $value) {
                $ServUndeletable = new Serv();
                $ServUndeletable->setIdService($value["idServ"]);
                array_push($dataObjectServ, $ServUndeletable);
            }

            return $dataObjectServ;
        }
    }
?>