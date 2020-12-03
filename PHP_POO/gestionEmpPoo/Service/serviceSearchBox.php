<?php 
    include_once '../DAO/SearchBoxDAO.php';
    require_once '../Class/ServiceException.php';

    class ServiceSearchBox {
        public function serviceFilter(String $searched) {
            try {
                $data = SearchBoxDAO::Filter($searched);
                return $data;
            } catch(DaoSqlException $se) {
                echo 'erreur -> ' . $se->getMessage() . ',' . $se->getCode();
            }
        }
    }
?> 