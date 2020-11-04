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

            include 'crud.php';
                        
            //*ADD SERV
            if (isset($_POST['add'])){
                addEmp($_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sup'], $_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['noService'], $_POST['noProj']);
            }
            //*DELETE SERV
            if ($_GET && $_GET["action"]=="delete"){   
                delEmp($_GET["id"]);  
            }
            
            //*MODIFY SERV
            if (isset($_POST['modify'])){ 
                modifyEmp($_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sup'], $_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['noService'], $_POST['noProj']);
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
                                <th scope="col">Salaire</th>
                                <th scope="col">Commission</th>
                                <th scope="col">Numéro de service</th>
                                <th scope="col">Numéro de projet</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                    
                        <tbody class="text-center">
                            <?php
                                searchAllEmp();
                                $dbServ = connexionBDD();
                                $i = 1;

                                function disabled($valueID){
                                    $dbServ = connexionBDD();
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
                                    ?>

                                    <td><a type='button' class='btn btn-primary' href='formAdd.php?action=modify&id=<?php echo $value["id"];?>'>Modifier</a></td>";
                                    <td><a type='button' class='btn btn-danger <?php disabled($value["id"]);?>' href='PHP_SQL.php?action=delete&id=<?php echo $value["id"];?>'>Supprimer</a></button></td>
                                    <?php
                                    echo"</tr>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="formAdd.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                    <a href="servTable.php"><button type="submit" class="btn btn-primary">Voir la table service</button></a>
                </div><?php
                ?>
            </div>
        </div>
    </body>
</html>