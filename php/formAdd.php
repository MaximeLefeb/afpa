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
        <?php

        ?>

        <div class="container"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                    <?php 
                    //* FORMULAIRE AJOUT 
                    if($_GET["action"]=="ajouter")
                    {   
                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Ajout</h1>
                            <form action="PHP_SQL.php" method="post">
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" name="nom">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prénom</label>
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                                <!-- EMPLOI -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Emploi</label>
                                    <select class="form-control form-control-lg" name="emploi">
                                        <option value="SECRETAIRE">SECRETAIRE</option>
                                        <option value="VENDEUR">VENDEUR</option>
                                        <option value="TECHNICIEN">TECHNICIEN</option>
                                        <option value="COMPTABLE">COMPTABLE</option>
                                        <option value="DIRECTEUR">DIRECTEUR</option>
                                        <option value="ANALYSTE">ANALYSTE</option>
                                        <option value="PROGRAMMEUR">PROGRAMMEUR</option>
                                        <option value="BALAYEUR">BALAYEUR</option>
                                        <option value="PUPITREUR">PUPITREUR</option>
                                    </select>
                                </div>
                                <!-- //SUPERIEUR -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supérieur hiérarchique</label>
                                    <select class="form-control form-control-lg" name="sup">
                                        <option>1</option>
                                        <option>7</option>
                                        <option>10</option>
                                        <option>13</option>
                                        <option>17</option>
                                    </select>
                                </div>
                                <!-- EMBAUCHE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Embauche</label>
                                    <input type="date" class="form-control" name="embauche">
                                </div>
                                <!-- SALAIRE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Salaire</label>
                                    <input type="text" class="form-control" name="sal">
                                </div>
                                <!-- COMMISION -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Commission</label>
                                    <input type="text" class="form-control" name="comm">
                                </div>
                                <!-- NUMERO SERVICE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Numéro de service</label>
                                    <select class="form-control form-control-lg" name="noService">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                </div>
                                <!-- PROJET -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Numéro de projet</label>
                                    <select class="form-control form-control-lg" name="noProj">
                                        <option>Aucun</option>
                                        <option>101</option>
                                        <option>102</option>
                                        <option>103</option>
                                    </select>
                                </div>

                                <input name="add" type="submit" class="btn btn-primary"></input>
                            </form>
                        </div><?php 
                    }
                    //* FORMULAIRE MODIF
                    else if($_GET["action"]=="modify")
                    {
                        $db = mysqli_init();
                        mysqli_real_connect($db, 'localhost','root','','societe');
                        $id = $_GET['id'];
                        $selectRequest = "SELECT * FROM employes WHERE id = $id";
                        $r = mysqli_query($db, $selectRequest);
                        $data = mysqli_fetch_array($r, MYSQLI_ASSOC);

                        $nom    = $data["Nom"];
                        $prenom = $data["Prenom"];
                        $emp    = $data["Emploi"];
                        $sup    = $data["Sup"];
                        $emb    = $data["Embauche"];
                        $sal    = $data["Sal"];
                        $comm   = $data["Comm"];
                        $noServ = $data["NoService"];
                        $noProj = $data["NoProj"];

                        function select($verified, $verifier){
                            if ($verified == $verifier) {
                                echo 'selected ';
                            }
                        }
                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Modif</h1>
                            <form action="PHP_SQL.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Numéro d'employes</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly>
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>">
                                </div>
                                <!-- EMPLOI -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Emploi</label>
                                    <select class="form-control form-control-lg" name="emploi">
                                        <option <?php select($emp,"SECRETAIRE");?>value="SECRETAIRE">SECRETAIRE</option>
                                        <option <?php select($emp,"VENDEUR"); ?>value="VENDEUR">VENDEUR</option>
                                        <option <?php select($emp,"TECHNICIEN");?>value="TECHNICIEN">TECHNICIEN</option>
                                        <option <?php select($emp,"COMPTABLE");?>value="COMPTABLE">COMPTABLE</option>
                                        <option <?php select($emp,"DIRECTEUR");?>value="DIRECTEUR">DIRECTEUR</option>
                                        <option <?php select($emp,"ANALYSTE");?>value="ANALYSTE">ANALYSTE</option>
                                        <option <?php select($emp,"PROGRAMMEUR");?>value="PROGRAMMEUR">PROGRAMMEUR</option>
                                        <option <?php select($emp,"BALAYEUR");?>value="">BALAYEUR</option>
                                        <option <?php select($emp,"PUPITREUR");?>value="PUPITREUR">PUPITREUR</option>
                                    </select>
                                </div>
                                <!-- //SUPERIEUR -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supérieur hiérarchique</label>
                                    <select class="form-control form-control-lg" name="sup" value="<?php echo $sup ?>">
                                        <option <?php select($sup,"1");?>value="1">1</option>
                                        <option <?php select($sup,"7");?>value="7">7</option>
                                        <option <?php select($sup,"10");?>value="10">10</option>
                                        <option <?php select($sup,"13");?>value="13">13</option>
                                        <option <?php select($sup,"17");?>value="17">17</option>
                                    </select>
                                </div>
                                <!-- EMBAUCHE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Embauche</label>
                                    <input type="date" class="form-control" name="embauche" value="<?php echo $emb ?>">
                                </div>
                                <!-- SALAIRE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Salaire</label>
                                    <input type="text" class="form-control" name="sal" value="<?php echo $sal ?>">
                                </div>
                                <!-- COMMISION -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Commission</label>
                                    <input type="text" class="form-control" name="comm" value="<?php echo $comm ?>">
                                </div>
                                <!-- NUMERO SERVICE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Numéro de service</label>
                                    <select class="form-control form-control-lg" name="noService" value="<?php echo $noServ ?>">
                                        <option <?php select($noServ,"1"); ?> value="1">1</option>
                                        <option <?php select($noServ,"2"); ?> value="2">2</option>
                                        <option <?php select($noServ,"3"); ?> value="3">3</option>
                                        <option <?php select($noServ,"4"); ?> value="4">4</option>
                                        <option <?php select($noServ,"5"); ?> value="5">5</option>
                                        <option <?php select($noServ,"6"); ?> value="6">6</option>
                                        <option <?php select($noServ,"7"); ?> value="7">7</option>
                                    </select>
                                </div>
                                <!-- PROJET -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Numéro de projet</label>
                                    <select class="form-control form-control-lg" name="noProj" value="$noProj">
                                        <option <?php select($noProj,NULL); ?> value="NULL">Aucun</option>
                                        <option <?php select($noProj,101); ?> value="101" >101</option>
                                        <option <?php select($noProj,102); ?> value="102" >102</option>
                                        <option <?php select($noProj,103); ?> value="103" >103</option>
                                    </select>
                                </div>

                                <input name="modify" type="submit" class="btn btn-primary" value="Modifier"/>
                            </form>
                        </div><?php 
                    }
                ?> 
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>