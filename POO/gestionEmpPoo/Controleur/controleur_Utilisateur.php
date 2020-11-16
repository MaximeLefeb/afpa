<?php 
    include_once '../Service/service_Utilisateur.php';
    include_once '../Presentation/presentation_Utilisateur.php';

    function userExist(String $verifMail) :Void {
        //* DB connexion{
        $dbUser = ConnectBdd();

        //* SQL REQUEST
        $exist = service_Utilisateur::service_searchUser($verifMail);

        if ($exist) {
            echo 'Cette adresse mail est déjà utilisé';
            showButton('../Controleur/controleur_formSignUp.php?action=register', '../Controleur/controleur_formSignUp.php?action=login', 'Réessayer', 'Se connecter');
        } else {
            service_Utilisateur::service_addUser($_POST['mail'], $_POST['pwd']);
            showButton('../Controleur/controleur_formSignUp.php?action=register','../Controleur/controleur_formSignUp.php?action=login','Inscrire un nouvel utilisateur', 'Se connecter');
        }
    }

    function ConnectUser(String $mail, String $pwd) :Void {
        $data = service_Utilisateur::service_searchUser($mail);
        $isPasswordCorrect = service_Utilisateur::verifyPwd($mail, $pwd);
        
        //* Si identifiant pas trouvé
        if (!$data) {
            echo '<h2> Mot de passe ou identifiant incorrect </h2>';
            showButton('../Controleur/controleur_formSignUp.php?action=login', '../Controleur/controleur_formSignUp.php?action=register', 'Réessayer', 'S\'inscrire');
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

    function checktypeOfUse() :Void {
        //* VERIF ADMIN
        if ($_SESSION['tou'] == 'Administrateur') {
            echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en administrateur <br> ';
        } else {
            echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'] . ' en utilisateur <br> ';
        }
        //* AFFICHAGE BOUTTON
        showButton('../Controleur/controleur_formSignUp.php?action=register','../Divers/disconnect.php','Inscrire un nouvel utilisateur', 'Se déconnecter');
        echo " 
            <hr> 
            <a type='button' class='btn btn-primary' href='../Controleur/controleur_Employe.php?action=showEmp'>Voir table employés</a>   
            <a type='button' class='btn btn-primary' href='../Controleur/controleur_Service.php?action=showServ'>Voir table service</a>";
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

            showButton('../Controleur/controleur_formSignUp.php?action=register','../Controleur/controleur_formSignUp.php?action=login','S\'inscrire', 'Se connecter');

        }
    }

    function CheckParam() :Void{
        if (!$_SESSION) {
            echo " <h1>Bonjour connecter vous pour accedez aux gestions des employes <br> 🤫 </h1> <hr> ";
            checkAction();
        } else {
            checktypeOfUse();
        }
    }
?> 