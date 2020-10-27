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
            include_once 'class/employe.php';
            include 'crud.php';

            //*ADD SERV
            if (isset($_POST['add'])){
                $id     = 100;
                $nom    = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $emp    = $_POST['emploi'];
                $sup    = $_POST['sup'];
                $emb    = $_POST['embauche'];
                $mail   = $_POST['sal'];
                $comm   = $_POST['comm'];
                $noServ = $_POST['noService'];
                $noProj = $_POST['noProj'];

                addEmp($nom,$prenom,$emp,$sup,$emb,$mail,$comm,$noServ,$noProj);

                $nouvelEmployes = new Employes($id,$nom,$prenom,$emp,$sup,$emb,$mail,$comm,$noServ,$noProj);
                echo $nouvelEmployes;
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
                <div class="col-sm-12">
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
                                $employes = array();
                                
                                echo"</tr>";
                                
                                foreach ($employes as $key => $value) {
                                    echo "<td>$value<td>";
                                }
                                ?>
                        </tbody>
                    </table>
                    
                    <a href="formAdd.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                    <a href="servTable.php"><button type="submit" class="btn btn-primary">Voir la table service</button></a>

                </div>
            </div>
        </div>
    </body>
</html>