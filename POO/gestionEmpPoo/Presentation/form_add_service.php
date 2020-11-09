<?php 
    session_start();

    if (!$_SESSION) {
        header('location: formLogin.php');
    }

    include_once 'ConnectBdd.php';
    include_once 'Service_mysqli_DAO.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire ajout</title>
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
        <!-- CSS -->
        <style>
            body{
                overflow-x:hidden;
            }
        </style>
    </head>

    <body>
        <div class="container"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                    <?php 
                    //* FORMULAIRE AJOUT 
                    if($_GET["action"]=="ajouter") {   
                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Ajout</h1>
                            <form action="tableau_service.php" method="POST">
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Id de service</label>
                                    <input type="number" class="form-control" name="idServ">
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom du service</label>
                                    <input type="text" class="form-control" name="serv">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ville</label>
                                    <input type="text" class="form-control" name="ville">
                                </div>

                                <input name="add" type="submit" class="btn btn-primary" value="Ajouter"></input>
                            </form>
                        </div>
                        <?php 
                    }
                    //* FORMULAIRE MODIF
                    else if($_GET["action"]=="modify") {   
                        $data = Service_mysqli_DAO::searchServ($_GET['idService']);
                        $idServ = $data["idService"];
                        $Serv   = $data["Service"];
                        $ville  = $data["Ville"];
                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Modif</h1>
                            <form action="tableau_service.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Numéro d'employes</label>
                                    <input type="text" class="form-control" name="idServ" value="<?php echo $idServ ?>" readonly>
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" name="serv" value="<?php echo $Serv ?>">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prénom</label>
                                    <input type="text" class="form-control" name="ville" value="<?php echo $ville ?>">
                                </div>

                                <input name="modify" type="submit" class="btn btn-primary" value="Modifier"/>
                            </form>
                        </div>
                        <?php 
                    }
                ?> 
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>