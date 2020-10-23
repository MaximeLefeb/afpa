<?php
function conexionBDD(){
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPwd  = '';
    $dbName = 'societe';

    $dbServ    = mysqli_init();
    $dbConnect = mysqli_real_connect($dbServ, $dbHost, $dbUser, $dbPwd, $dbName);

    return $dbServ;
}
