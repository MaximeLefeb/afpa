<?php
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
                if (isset($_POST['idServ']) && !empty($_POST['idServ']) && 
                    isset($_POST['serv']) && !empty($_POST['serv']) &&
                    isset($_POST['ville'])&& !empty($_POST['ville'])) {  

                    $Service = new Service();
                    $Service->setIdService($_POST['idServ'])->setService($_POST['serv'])->setVille($_POST['ville']);

                    addServ($_POST['idServ'],$_POST['serv'],$_POST['ville']);

                }
            }
            //*DELETE SERV
            if ($_GET && $_GET["action"]=="delete"){  
                if (!empty($_GET['idService'])) { 

                    delServ($_GET['idService']);

                }
            }
            //*MODIFY SERV
            if (isset($_POST['modify'])){ 
                if (isset($_POST['idServ']) && isset($_POST['serv']) && isset($_POST['ville'])) {

                    $ServiceModified = new Service();
                    $ServiceModified->setIdService($_POST['idServ'])->setService($_POST['serv'])->setVille($_POST['ville']);

                    modifyServ($ServiceModified);

                }
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-12 mb-5">
                        <table class="table table-striped table-dark">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">idService</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Ville</th>
                                    <?php 
                                    if ($_SESSION['tou'] == 'Administrateur') {
                                        ?>
                                        <th scope="col">Modification</th>
                                        <th scope="col">Suppression</th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                        
                            <tbody class="text-center">
                                <?php
                                    $dataServ= searchAllServ();
                                    $i = 1;
                                    foreach ($dataServ as $key => $value) {
                                        echo "<tr id=trNo-".$i.">";
                                        foreach ($value as $k => $v) {
                                            echo "<td>$v</td>";
                                        }
                                        
                                        if ($_SESSION['tou'] == 'Administrateur') {
                                            ?>
                                        
                                            <td><a type='button' class='btn btn-primary' href='form_add_employe.PHP?action=modify&id=<?php echo $value["id"];?>'>Modifier</a></td>";
                                            <td><a type='button' class='btn btn-danger <?php disabled($value["id"]);?>' href='mainGestion.php?action=delete&id=<?php echo $value["id"];?>'>Supprimer</a></button></td>
                                        
                                            <?php
                                        }
                                    
                                        echo"</tr>";
                                        $i++;
                                    }                        
                                ?>
                            </tbody>
                        </table>
                        <a href="form_add_service.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un service</button></a>
                        <a href="tableau_employe.php"><button type="submit" class="btn btn-primary">Voir la table employes</button></a>
                    </div><?php
                  
                ?><div class="col-sm-1"></div>
            </div>
        </div>
    </body>
</html>