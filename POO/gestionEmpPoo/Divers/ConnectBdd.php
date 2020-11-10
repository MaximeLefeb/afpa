<?php 
    function ConnectBdd() {
        //* CONNECT BDD
        $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');
        return $mysqli;
    }
?> 