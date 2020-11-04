<?php 
    include 'ConnectBdd.php';

    function add($idServ,$Service,$ville){
        //* TRAITEMENT AJOUT
        if (isset($idServ) && isset($Service) && isset($ville))
        {      
            $dbServ=connexionBDD();
            
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
            
            $dbServ=connexionBDD();
            
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
            
            $dbServ=connexionBDD();
            
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

    function searchAll(){
        //* SEARCH BDD
        global $data;
        $dbServ=connexionBDD();
        $requestSelectServ = mysqli_query($dbServ, 'SELECT * FROM serv');
        $data = mysqli_fetch_all($requestSelectServ, MYSQLI_ASSOC); 
    }

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

    // !---------------------------------------------------------- SESSION -----------------------------------------------------------------------

    include_once 'class/Utilisateur.php';

    function AddUser(String $mail, String $pwd) :Void {
        
        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
        $ToU = 'Utilisateur';
        
        $user = new Utilisateur;
        $user->setMail($mail)->setPwd($pwdHash);

        //* DB connexion
        $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

        //* SQL request
        $stmt = $mysqli->prepare("INSERT INTO user (`id`, `mail`, `typeOfUser`, `password`) VALUES (NULL, ?, ?, ?)");
        $stmt->bind_param("sss", $mail, $ToU, $pwdHash);

        //* Verify request
        if($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Ajout ok');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Erreur lors de l insertion en base de donnée);</script>";
        }

        //* Close connection 
        $mysqli->close();
    }

    function searchUser(String $mail) :?Array {
        //* DB connexion
        $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

        //* SQL REQUEST
        $selectRequest = $mysqli->prepare("SELECT * FROM user WHERE mail = ?");
        $selectRequest->bind_param("s", $mail);
        $selectRequest->execute();
        $rs   = $selectRequest->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);

        //* Close connection
        $rs->free();
        $mysqli->close();

        return $data;
    }

    function ConnectUser(String $mail, String $pwd) :Void {
        $data = searchUser($mail);

        //* Verify password
        $isPasswordCorrect = password_verify($pwd, $data['password']);
        
        //* Si identifiant pas trouvé
        if (!$data) {
            echo '<h2>Mauvais mot de passe ou identifiant</h2>';
            showButton('formLogin.php', 'formSignUp.php', 'Réessayer', 'S\'inscrire');
        } else {
            //* si mot de passe correct
            if ($isPasswordCorrect) {
                
                $_SESSION['id'] = $data['id'];
                $_SESSION['tou'] = $data['typeOfUser'];
                $_SESSION['mail'] = $data['mail'];

                echo 'CTRL + F5';

            } else {
                echo 'Mot de passe incorrect';
            }
        }
    }

    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
?>