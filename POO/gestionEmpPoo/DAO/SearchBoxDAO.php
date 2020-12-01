<?php 
    require_once '../Divers/ConnectBdd.php';
    require_once '../class/DaoSqlException.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class SearchBoxDAO {
        public static function Filter(String $searched) :Array {
            try {
                $db = ConnectBdd();
                $query = "SELECT * FROM `employes` AS e WHERE prenom = ?";
                $filterRequest = $db->prepare($query);
                $filterRequest->bind_param("s", $searched);
                $filterRequest->execute();
                $result = $filterRequest->get_result();
                $resultOfFilterRequest = $result->fetch_all(MYSQLI_ASSOC);
                var_dump($resultOfFilterRequest);

                return $resultOfFilterRequest;
            } catch (mysqli_sql_exception $e) {
                throw new DaoSqlException($e->getMessage(), $e->getCode());
            }
        }
    }
?> 