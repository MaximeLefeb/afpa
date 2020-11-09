<?php 
    include_once '../Service/service_Utilisateur.php';

    function userExist(String $verifMail) :Void {
        //* DB connexion{
        $dbUser = ConnectBdd();

        //* SQL REQUEST
        $exist = service_Utilisateur::service_searchUser($verifMail);

        if ($exist) {
            echo 'Cette adresse mail est déjà utilisé';
            showButton('../Presentation/formSignUp.php', '../Presentation/formLogin.php', 'Réessayer', 'Se connecter');
        } else {
            Utilisateur_mysqli_DAO::AddUser($_POST['mail'], $_POST['pwd']);
            showButton('../Presentation/formSignUp.php','../Presentation/formLogin.php','Inscrire un nouvel utilisateur', 'Se connecter');
        }
    }

    function ConnectUser(String $mail, String $pwd) :Void {
        $data = service_Utilisateur::service_searchUser($mail);
        $isPasswordCorrect = service_Utilisateur::verifyPwd($mail, $pwd);
        
        //* Si identifiant pas trouvé
        if (!$data) {
            echo '<h2> Mot de passe ou identifiant incorrect </h2>';
            showButton('../Presentation/formLogin.php', '../Presentation/formSignUp.php', 'Réessayer', 'S\'inscrire');
        } else {
            //* si mot de passe correct
            if ($isPasswordCorrect) {
                
                $_SESSION['id'] = $data['id'];
                $_SESSION['tou'] = $data['typeOfUser'];
                $_SESSION['mail'] = $data['mail'];
                echo 'CTRL + F5';

            } else {
                echo '<h2> Mot de passe incorrect </h2>';
            }
        }
    }

    function showButton(String $url1, String $url2, String $nameButton1, String $nameButton2) :Void {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }

    function checktypeOfUse() :Void {
        if ($_SESSION['tou'] == 'Administrateur') {
            echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en administrateur <br> ';
        } else {
            echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en utilisateur <br> ';
        }
        showButton('../Presentation/formSignUp.php','../Divers/disconnect.php','Inscrire un nouvel utilisateur', 'Se déconnecter');

        echo " <hr>
            <div>
                <h1>Accès tables</h1>".
                showButton('../Presentation/tableau_employe.php','../Presentation/tableau_service.php','Voir la table employes', 'Voir la table service'); ."
            </div>";
    }

    function checkAction() :Void {
        if (isset($_POST['add'])) {
            //* SI LES CHAMPS SONT CORRECTS
            if (isset($_POST['mail']) && !empty($_POST['mail']) &&
                isset($_POST['pwd']) && !empty($_POST['pwd'])) {

                //* VERIF USER EXIST
                $exist = userExist($_POST['mail']);

            }
        //* SI ON SE CONNECTE
        } else if(isset($_POST['connect'])) {
            //* SI LES CHAMPS SONT CORRECTS
            if (isset($_POST['mailLogin']) && !empty($_POST['mailLogin']) &&
                isset($_POST['pwdLogin']) && !empty($_POST['pwdLogin'])) {

                ConnectUser($_POST['mailLogin'], $_POST['pwdLogin']);  

            }
        //* AFFICHAGE D'ACCEUIL
        } else {

            showButton('../Presentation/formSignUp.php','../Presentation/formLogin.php','S\'inscrire', 'Se connecter');

        }
    }

    function CheckParam() :void{
        if (!$_SESSION) {
            echo " <h1>Bonjour connecter vous pour accedez aux gestions des employes <br> 🤫 </h1> <hr> ";
            checkAction();
        } else {
            checktypeOfUse();
        }
    }
?> 