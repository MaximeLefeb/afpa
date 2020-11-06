<?php 
    session_start();

    if (!$_SESSION) {
        header('location: formLogin.php');
    }

    include_once 'crud_employe.php';
    include_once 'class/Employe.php';
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
        <!-- JQUERY -->
        <script
            src         ="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin ="anonymous">
        </script>
        <style>
            .isDisabled {
                color: currentColor;
                cursor: not-allowed;
                opacity: 0.5;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <?php 
                        
            //*ADD SERV
            if (isset($_POST['add'])) {
                if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
                    isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['sal']) && !empty($_POST['sal']) &&
                    isset($_POST['comm']) && isset($_POST['noService']) && !empty($_POST['noService']) && isset($_POST['noProj']) && !empty($_POST['noProj'])) {

                    $employeAdd = new Employe();
                    $employeAdd->setNom($_POST['nom'])->setPrenom($_POST['prenom'])->setEmp($_POST['emploi'])->setSup($_POST['sup'])->setEmb($_POST['embauche'])->setSal($_POST['sal'])->setComm($_POST['comm'])->setNoServ($_POST['noService'])->setNoProj($_POST['noProj']);

                    addEmp($employeAdd);

                }
            }
            //*DELETE SERV
            if ($_GET && $_GET["action"]=="delete"){   
                if (!empty($_GET['id'])) {
                    
                    delEmp($_GET["id"]);  
                
                }
            }
            //*MODIFY SERV
            if (isset($_POST['modify'])) { 
                if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['emploi']) && !empty($_POST['emploi']) && 
                    isset($_POST['sup']) && !empty($_POST['sup']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['sal']) && !empty($_POST['sal']) &&
                    isset($_POST['comm']) && isset($_POST['noService']) && !empty($_POST['noService']) && isset($_POST['noProj']) && !empty($_POST['noProj'])) {

                    $employeModif = new Employe();
                    $employeModif->setId($_POST['id'])->setNom($_POST['nom'])->setPrenom($_POST['prenom'])->setEmp($_POST['emploi'])->setSup($_POST['sup'])->setEmb($_POST['embauche'])->setSal($_POST['sal'])->setComm($_POST['comm'])->setNoServ($_POST['noService'])->setNoProj($_POST['noProj']);

                    modifyEmp($employeModif);
                
                }
            }

        ?>
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
                                <?php
                                if ($_SESSION['tou'] == 'Administrateur') {
                                    ?>

                                    <th scope="col">Salaire</th>
                                    <th scope="col">Commission</th>
                                    
                                    <?php
                                }
                                ?>
                                <th scope="col">Numéro de service</th>
                                <th scope="col">Numéro de projet</th>
                                <?php
                                if ($_SESSION['tou'] == 'Administrateur') {
                                    ?>

                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>

                                    <?php
                                }
                                ?>
                            </tr>
                        </thead>
                    
                        <tbody class="text-center">
                            <?php
                                searchAllEmp();
                                $dbServ = ConnectBdd();
                                $dataEmp = searchAllEmp();
                                $i = 1;

                                function disabled($valueID){
                                    $dbServ = ConnectBdd();
                                    $noSup = "SELECT DISTINCT e.id FROM `employes` AS e INNER JOIN `employes` AS e1 WHERE e.id=e1.sup";
                                    $SqlRequest=mysqli_query($dbServ, $noSup);
                            
                                    foreach ($SqlRequest as $sup) {
                                        foreach ($sup as $nbSup) {
                                            if ($valueID == $nbSup) {
                                                echo 'isDisabled';
                                            }
                                        }
                                    }
                                }

                                foreach ($dataEmp as $key => $value) {
                                    echo "<tr id=trNo-".$i.">";
                                    foreach ($value as $k => $v) {
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
                </div><?php
                ?>
            </div>
        </div>
    </body>
</html>