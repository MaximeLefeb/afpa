<?php 
    include_once '../Controleur/controleur_Employe.php';
    session_start();

    if (!$_SESSION) {
        header('location: formLogin.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php et les bdd</title>
         <!-- BOOTSTRAP -->
         <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
        <!-- CSS -->
        <style>
            .isDisabled {
                color          : currentColor;
                cursor         : not-allowed;
                opacity        : 0.5;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">    
                <div class="col-sm-12 mb-3">
                    <table class="table table-striped table-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Emploi</th>
                                <th scope="col">Supérieur</th>
                                <th scope="col">Date d'embauche</th>
                                <th scope="col">Salaire</th>
                                <th scope="col">Commission</th>
                                <th scope="col">Numéro de service</th>
                                <th scope="col">Numéro de projet</th>
                                <?php
                                if ($_SESSION['tou'] == 'Administrateur') {
                                    ?>

                                    <th scope='col'>Modifier</th>
                                    <th scope='col'>Supprimer</th>

                                    <?php
                                }
                                ?>
                            </tr>
                        </thead>
                    
                        <tbody class="text-center">
                            <?php
                                $dbServ  = ConnectBdd();
                                $dataEmp = Employe_mysqli_DAO::searchAllEmp();
                                $i = 1;

                                foreach ($dataEmp as $value) {
                                    echo "<tr id=trNo-".$i.">";
                                    foreach ($value as $v) {
                                        echo "<td>$v</td>";
                                    }
                                    
                                    if ($_SESSION['tou'] == 'Administrateur') {
                                        ?>
                                    
                                        <td><a type='button' class='btn btn-primary' href='form_add_employe.PHP?action=modify&id=<?php echo $value["id"];?>'>Modifier</a></td>";
                                        <td><a type='button' class='btn btn-danger <?php disabled($value["id"]);?>' href='tableau_employe.php?action=delete&id=<?php echo $value["id"];?>'>Supprimer</a></button></td>
                                    
                                        <?php
                                    }
                                    echo"</tr>";
                                    $i++;
                                }                        
                            ?>
                        </tbody>
                    </table>

                    <a href="form_add_employe.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                    <a href="tableau_service.php"><button type="submit" class="btn btn-primary">Voir la table service</button></a>

                </div>
            </div>
        </div>
    </body>
</html>