<?php 

    include_once 'class/Utilisateur.php';
    include_once 'ConnectBdd.php';

    //! ------------------------------------------------------------ SESSION ------------------------------------------------------------------------

    function hashPwd(String $pwd) :String {
        $beHashed = password_hash($pwd, PASSWORD_DEFAULT);
        return $beHashed;
    }

    function AddUser(String $mail, String $pwd) :Void {
        $pwdHash = hashPwd($pwd);
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
            ?><script type='text/javascript'> alert('Ajout ok'); </script><?php
        } else {
            ?><script type='text/javascript'> alert('Erreur lors de l insertion en base de donnée'); </script><?php
        }

        //* Close connection 
        $mysqli->close();
    }

    function searchUser(String $mail) :?Array {
        //* DB connexion
        $dbUser = ConnectBdd();

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
                echo '<h2>Mot de passe incorrect</h2>';
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

    function userExist(String $verifMail) :Bool {
        //* DB connexion{
        $dbUser = ConnectBdd();

        //* SQL REQUEST
        $exist = searchUser();

        if ($exist > 0) {
            return true;
        } else {
            return false;
        }
    }

?>