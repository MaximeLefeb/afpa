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
    </head>

    <body>
        <?php 

            include 'crud.php';
            
            //*ADD SERV
            if (isset($_POST['add'])){
                add($_POST['idServ'],$_POST['serv'],$_POST['ville']);
            }
            //*DELETE SERV
            if ($_GET && $_GET["action"]=="delete"){   
                del($_GET["idService"]);
            }
            //*MODIFY SERV
            if (isset($_POST['modify'])){ 
                modify($_POST['idServ'],$_POST['serv'],$_POST['ville']);
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-10 mb-5">
                        <table class="table table-striped table-dark">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">idService</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Modification</th>
                                    <th scope="col">Suppression</th>
                                </tr>
                            </thead>
                        
                            <tbody class="text-center">
                                <?php
                                    searchAll();
                                    $i = 1;
                                    foreach ($data as $key => $value) {
                                        echo "<tr id=trNo-".$i.">";
                                        foreach ($value as $k => $v) {
                                            echo "<td>$v</td>";
                                        }?>
                                        <td><a type='button' class='btn btn-primary' href='formServ.php?action=modify&idService=<?php echo $value["idService"];?>'>Modifier</a></td>";
                                        <td><a type='button' class='btn btn-danger' href='servTable.php?action=delete&idService=<?php echo $value["idService"]; ?>'>Supprimer</a></td>";
                                        </tr>;<?php 
                                        $i++;
                                    }                        
                                ?>
                            </tbody>
                        </table>
                        <a href="formServ.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un service</button></a>
                        <a href="PHP_SQL.php"><button type="submit" class="btn btn-primary">Voir la table employes</button></a>
                    </div><?php
                  
                ?><div class="col-sm-1"></div>
            </div>
        </div>
    </body>
</html>