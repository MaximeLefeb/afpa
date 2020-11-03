<?php 

    include_once 'class/Utilisateur.php';

    function AddUser(String $mail, String $pwd) {
        
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
            echo "
                <br>
                    <a type='button' class='btn btn-primary' href='formSignUp.php'>Inscrire un nouveau utilisateur</a>
                    <a type='button' class='btn btn-primary' href='formLogin.php'>Se connecter</a>
                <br>";
        } else {
            echo "<script type='text/javascript'>alert('Erreur lors de l insertion en base de donnée);</script>";;
        }

        //* Close connection 
        $mysqli->close();
    }

    function ConnectUser(String $mail, String $pwd) {

        session_start();
        
        //* DB connexion
        $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

        //* SQL REQUEST
        $selectRequest = $mysqli->prepare("SELECT * FROM user WHERE mail = ?");
        $selectRequest->bind_param("s", $mail);
        $selectRequest->execute();
        $rs   = $selectRequest->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);

        //* Verify password
        $isPasswordCorrect = password_verify($pwd, $data['password']);
        
        if (!$data) {
            echo "<script type='text/javascript'>alert('Mauvais identifiant ou mot de passe');</script>";
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['mail'] = $mail;

                echo 'Bienvenue, Vous êtes connecté via ' . $_SESSION['mail'];

                echo "
                    <br>
                        <a type='button' class='btn btn-primary' href='formSignUp.php'>Inscrire un nouveau utilisateur</a>
                        <a type='button' class='btn btn-primary' href='PHP_SQL.php'>Se déconnecter</a>
                    <br>";

            } else {
                echo "<script type='text/javascript'>alert('Mauvais identifiant ou mot de passe');</script>";
            }
        }
        
        //* Close connection
        $rs->free();
        $mysqli->close();

    }
?>