<?php 

    include_once 'class/Utilisateur.php';

    function insertInto() {
        $user = new Utilisateur();
        $user->setMail($_POST['mail'])->setTypeOfUser($_POST['typeOfUser'])->setPwd($_POST['pwd']);
        //* create var
        $id   = $user->getId();
        $mail = $user->getMail();
        $ToU  = $user->getTypeOfUser();
        $pwd  = $user->getPwd();

        //* db connexion
        $mysqli = new mysqli('localhost', 'root', '', 'sqlipoo');

        //* SQL request
        $stmt = $mysqli->prepare("INSERT INTO user (`id`, `mail`, `typeOfUser`, `password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $mail, $ToU, $pwd);

        //* Verify request
        if($stmt->execute()){
            echo 'O.K';
        } else {
            echo 'K.O';
        }

        //* close connection 
        $mysqli->close();
    }

?>

<head>
    <!-- BOOTSTRAP -->
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
    <!-- JQUERY -->
    <script
        src         ="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin ="anonymous">
    </script>
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <?php 

                if (isset($_POST)) {
                    if (isset($_POST['mail']) && !empty($_POST['mail']) &&
                        isset($_POST['typeOfUser']) && !empty($_POST['typeOfUser']) &&
                        isset($_POST['pwd']) && !empty($_POST['pwd'])) {

                        insertInto();

                    }
                }

            ?>

            <br><br><a type='button' class='btn btn-primary' href='formSignUp.php'>Ajouter un nouvel utilisateur</a><br><br>
        </div>
    </div>
</div>