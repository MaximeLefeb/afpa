<?php
    session_start();
    session_destroy();
    header("location:Acceuil.php"); 
    exit();
?>