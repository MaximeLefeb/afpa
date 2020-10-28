<?php
    include 'ConnectBdd.php';

    //!---------------------------------------------TABLE EMPLOYES------------------------------------------------

    function searchAllEmp(){
        //* SEARCH BDD
        global $dataEmp;
        $dbServ=connexionBDD();
        $requestSelectServ = mysqli_query($dbServ, 'SELECT * FROM employes');
        $dataEmp = mysqli_fetch_all($requestSelectServ, MYSQLI_ASSOC); 
    }

    function addEmp($nom,$prenom,$emp,$sup,$emb,$sal,$comm,$noServ,$noProj){
        //* TRAITEMENT AJOUT

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emploi']) && 
            isset($_POST['sup']) && isset($_POST['embauche']) && isset($_POST['sal']) &&
            isset($_POST['comm']) && isset($_POST['noService'])&& isset($_POST['noProj']))
        {
            $dbServ = connexionBDD();
            $nom    = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $emp    = $_POST['emploi'];
            $sup    = $_POST['sup'];
            $emb    = $_POST['embauche'];
            $sal    = $_POST['sal'];
            $comm   = $_POST['comm'];
            $noServ = $_POST['noService'];
            $noProj = $_POST['noProj'];
            
            if($comm == '0')$comm = 'NULL';
            if($noProj == "Aucun")$noProj = 'NULL';

            //*REQUETE SQL ADD
            $AddRequest = "INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER('$nom'),UPPER('$prenom'),'$emp','$sup',$emb,$sal,$comm,$noServ,$noProj)";
            
            //*VERIF REQUETE SQL
            if(mysqli_query($dbServ, $AddRequest)){
                ?><script>alert("Add emp ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de l'ajout d'employes en base de données");</script><?php
            }
        } 
    }

    function delEmp($idServ){
        //* TRAITEMENT SUPRESSION
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        
            $dbServ=connexionBDD();
            
            //*REQUETE SQL DEL
            $DeleteRequest = "DELETE FROM employes WHERE id = $id";

            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $DeleteRequest)) {
                ?><script>alert("Delete emp ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de la suppression d'employes");</script><?php
            }
        }
    }

    function modifyEmp(){
        //* TRAITEMENT MODIFICATION
        if (isset($_POST['id']) &&isset($_POST['nom']) && 
            isset($_POST['prenom']) && isset($_POST['emploi']) && 
            isset($_POST['sup']) && isset($_POST['embauche']) && 
            isset($_POST['sal']) && isset($_POST['comm']) && 
            isset($_POST['noService'])&& isset($_POST['noProj']))
        {
            $id     = $_POST['id'];
            $nom    = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $emp    = $_POST['emploi'];
            $sup    = $_POST['sup'];
            $emb    = $_POST['embauche'];
            $sal    = $_POST['sal'];
            $comm   = $_POST['comm'];
            $noServ = $_POST['noService'];
            $noProj = $_POST['noProj'];
            
            $dbServ=connexionBDD();
            
            //*REQUETE SQL MODIFY
            $ModiFyRequest = "UPDATE `employes` SET Nom=UPPER('$nom'), Prenom=UPPER('$prenom'), Emploi='$emp', Sup='$sup', Embauche='$emb', Sal='$sal', Comm='$comm', NoService='$noServ', NoProj='$noProj' WHERE id = $id";
            
            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $ModiFyRequest)) {
                ?><script>alert("Modif emp ok");</script><?php
            }else{
                ?><script>alert("Echec de la modif emp");</script><?php
            }
        }else{
            echo "Erreur Isset";
        }
    }   
?>