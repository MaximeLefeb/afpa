<?php
    function searchAll(){
        global $data;
        include 'ConnectBdd.php';
        $requestSelectServ = mysqli_query($dbServ, 'SELECT * FROM serv');
        $data = mysqli_fetch_all($requestSelectServ, MYSQLI_ASSOC); 
    }

    function add($idServ,$Service,$ville){
        //* TRAITEMENT AJOUT
        if (isset($idServ) && isset($Service) && isset($ville))
        {      
            include 'ConnectBdd.php';

            //*REQUETE SQL ADD
            $AddRequest = "INSERT INTO `serv` (`idService`, `Service`, `Ville`) VALUES ('$idServ', UPPER('$Service'), UPPER('$ville'))";

            //*VERIF REQUETE SQL
            if(mysqli_query($dbServ, $AddRequest)){
                ?><script>alert("Add ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de l'ajout en base de données");</script><?php
            }
        } 
    }

    function del($idServ){
        //* TRAITEMENT SUPRESSION
        if (!empty($_GET['idService'])) {
            $idServ = $_GET['idService'];

            include 'ConnectBdd.php';

            //*REQUETE SQL DEL
            $DeleteRequest = "DELETE FROM `serv` WHERE idService = $idServ";

            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $DeleteRequest)) {
                ?><script>alert("Delete ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de la suppression");</script><?php
            }
        }
    }

    function modify(){
        //* TRAITEMENT MODIFICATION
        if (isset($_POST['idServ']) && isset($_POST['serv']) && isset($_POST['ville']))
        {
            $idServ  = $_POST['idServ'];
            $Service = $_POST['serv'];
            $ville   = $_POST['ville'];

            include 'ConnectBdd.php';

            //*REQUETE SQL MODIFY
            $ModiFyRequest = "UPDATE `serv` SET idService='$idServ', service =UPPER('$Service'), ville=UPPER('$ville') WHERE idService = $idServ";

            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $ModiFyRequest)) {
                ?><script>alert("Modif ok");</script><?php
            }else{
                ?><script>alert("Echec de la modif");</script><?php
            }
        }else{
            echo "Erreur Isset";
        }
    }
?>