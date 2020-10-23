<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Mes regex en php</title>
        <meta charset="utf-8">
    </head>

    <body>
        <form action="regex.php" method="POST">
                <!-- numéro client -->
            <div>
                <label for="clientNumber">Votre numéro client</label><br>
                <input type="text" name="clientNumber" value="F159753486" required><br>
            </div>
                <!-- Numéro telephone -->
            <div>
                <label for="clientNumber">Votre numro de téléphone</label><br>
                <input type="text" name="tel" value="0610423765" required>
            </div>  
                <!-- Adresse mail -->
            <div>
                <label for="clientNumber">Votre addresse mail</label><br>
                <input type="email" name="mail" value="AlbertTest@gmail.com" required>
            </div>
                <!--Numéro sécurité social -->
            <div>
                <label for="clientNumber">Votre numéro de sécurité social</label><br>
                <input type="text" name="numeroSecuriteSocial" value="1 99 12 62 119 297 21" required>
            </div>
            <br><input type="submit" value="Envoyer"><br>
        </form>

        <?php
            if (isset($_POST)) {
                if (!empty($_POST['clientNumber']) && isset($_POST['clientNumber']) && 
                    !empty($_POST['tel']) && isset($_POST['tel']) &&
                    !empty($_POST['mail']) && isset($_POST['mail']) && 
                    !empty($_POST['numeroSecuriteSocial']) && isset($_POST['numeroSecuriteSocial'])) {

                    $numeroCLient         = $_POST['clientNumber'];
                    $numeroTel            = $_POST['tel'];
                    $mail                 = $_POST['mail'];
                    $numeroSecuriteSocial = $_POST['numeroSecuriteSocial'];

                    if (preg_match("#^F[1-9]{9}#", $numeroCLient) && 
                        preg_match("#^0(6|7)[0-9]{8}$#",$numeroTel) && 
                        preg_match("#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#", $mail) && 
                        preg_match("#^([1-37-8])([0-9]{2})(0[0-9]|[2-35-9][0-9]|[14][0-2])((0[1-9]|[1-8][0-9]|9[0-69]|2[abAB])(00[1-9]|0[1-9][0-9]|[1-8][0-9]{2}|9[0-8][0-9]|990)|(9[78][0-9])(0[1-9]|[1-8][0-9]|90))([0-9]{3})?([0-8][0-9]|9[0-7])#x", $numeroSecuriteSocial)) {

                        echo "Saisie correct ; $numeroCLient, $numeroTel, $mail.";
                    } else {
                        echo "Saisie incorrect ; $numeroCLient, $numeroTel, $mail.";
                    }
                }
            }
        ?>
    </body>
</html>