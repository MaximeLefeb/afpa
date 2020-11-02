<?php 

    include_once 'Utilisateur.php';

    if (isset($_POST)) {
        if (isset($_POST['mail']) && !empty($_POST['mail']) &&
            isset($_POST['typeOfUser']) && !empty($_POST['typeOfUser']) &&
            isset($_POST['pwd']) && !empty($_POST['pwd'])) {

            $user = new Utilisateur();
            $user->setMail($_POST['mail'])->setTypeOfUser($_POST['typeOfUser'])->setPwd($_POST['pwd']);
            $id = $user->getId();
            $mail = $user->getMail();
            $ToU = $user->getTypeOfUser();
            $pwd = $user->getPwd();

            //* Connexion bdd
            $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

            //* Requete SQL
            $stmt = $mysqli->query(" INSERT INTO user (`id`, `mail`, `typeOfUser`, `password`) VALUES (?, ?, ?, ?) ");
            var_dump($stmt);
            $stmt->bind_param("isss", $id, $mail, $tou, $pwd);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);

            //*close connection & request SQL
            $rs->free();
            $mysqli->close();

        }
    }
?>