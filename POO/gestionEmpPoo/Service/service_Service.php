<?php 
    include_once '../DAO/Service_mysqli_DAO.php';
    require_once '../Class/ServiceException.php';

    class service_Service {
        public static function service_addServ($idServ,$serv,$ville) :Void {
            $Service = new Service();
            $Service->setIdService($idServ)->setService($serv)->setVille($ville);
           
            try {
                Service_mysqli_DAO::add($Service);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_delServ() :Void {
            try {
                Service_mysqli_DAO::delete($_GET['idService']);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_modifyServ($idServ,$serv,$ville) :Void {
            $ServiceModified = new Service();
            $ServiceModified->setIdService($idServ)->setService($serv)->setVille($ville);

            try {
                Service_mysqli_DAO::modif($ServiceModified);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        }

        public static function service_searchAllServ() :Array {
            try {
                $dataServ = Service_mysqli_DAO::searchAll();
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
        
            $dataObject = array();

            foreach ($dataServ as $value) {
                $Serv = new Service();
                $Serv->setIdService($value["idService"])->setService($value["Service"])->setVille($value["Ville"]);
                array_push($dataObject, $Serv);
            }

            return $dataObject;
        }

        public static function service_searchServ(String $idServ) :?Service {
            try {
                $data = Service_mysqli_DAO::searchById($idServ);
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
            
            $Serv = new Service();
            $Serv->setIdService($data["idService"])->setService($data["Service"])->setVille($data["Ville"]);

            return $Serv;

        }

        public static function service_selectDependence() :Array  {
            try {
                $data = Service_mysqli_DAO::selectDependence();
            } catch(DaoSqlException $se) {
                throw new ServiceException($se->getMessage(), $se->getCode());
            }
            
            $dataObjectServ = array();

            foreach ($data as $value) {
                $ServUndeletable = new Service();
                $ServUndeletable->setIdService($value["idService"]);
                array_push($dataObjectServ, $ServUndeletable);
            }

            return $dataObjectServ;
        }
    }
?>