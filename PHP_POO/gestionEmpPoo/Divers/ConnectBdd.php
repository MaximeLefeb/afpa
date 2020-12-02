<?php 
    function ConnectBdd() {
        //* CONNECT BDD
        try {
            $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');
            return $mysqli;
        } catch (\Throwable $th) {
            throw new DaoSqlException($e->getMessage(), $e->getCode());
        }
    }
?> 