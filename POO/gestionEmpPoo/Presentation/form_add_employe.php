<?php 
    function select($verified, $verifier){
        if ($verified == $verifier) {
            echo 'selected ';
        }
    }
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
        <!-- CSS -->
        <style>
            body {
                overflow-x:hidden;
            }
        </style>
    </head>

    <body>
        <?php
            //* FORMULAIRE AJOUT 
            function afficherPageAjout() :Void {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Ajout</h1>
                            <form action="../Controleur/controleur_Employe.php" method="post">
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" name="nom" required>
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" required>
                                </div>
                                <!-- EMPLOI -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Emploi</label>
                                    <select class="form-control form-control-lg" name="emploi" required>
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
                                    <select class="form-control form-control-lg" name="sup" required>
                                        <option>1</option>
                                        <option>3</option>
                                        <option>6</option>
                                        <option>8</option>
                                        <option>14</option>
                                        <option>29</option>
                                    </select>
                                </div>
                                <!-- EMBAUCHE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Embauche</label>
                                    <input type="date" class="form-control" name="embauche" required>
                                </div>
                                <!-- SALAIRE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Salaire</label>
                                    <input type="text" class="form-control" name="sal" required>
                                </div>
                                <!-- COMMISION -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Commission</label>
                                    <input type="text" class="form-control" name="comm">
                                </div>
                                <!-- NUMERO SERVICE -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Numéro de service</label>
                                    <select class="form-control form-control-lg" name="noService" required>
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
                                        <option></option>
                                        <option value="101" >101</option>
                                        <option value="102" >102</option>
                                        <option value="103" >103</option>
                                    </select>
                                </div>

                                <input name="add" type="submit" class="btn btn-primary"></input>
                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
                <?php 
            }
            //* FORMULAIRE MODIF
            function afficherPageModif(?String $id, String $nom, String $prenom, String $emp, ?Int $sup, String $emb, Float $sal, ?Int $comm, Int $noServ, ?Int $noProj) :Void {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Modif</h1>
                            <form action="../Controleur/controleur_Employe.php" method="post">
                                <div class="form-group">
                                    <label for="idEmp">Numéro d'employes</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly>
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>" required>
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>" required>
                                </div>
                                <!-- EMPLOI -->
                                <div class="form-group">
                                    <label for="Emp">Emploi</label>
                                    <select class="form-control form-control-lg" name="emploi" required>
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
                                    <label for="">Supérieur hiérarchique</label>
                                    <select class="form-control form-control-lg" name="sup" value="<?php echo $sup ?>" required>
                                        <option <?php select($sup,"1");?>value="1">1</option>
                                        <option <?php select($sup,"3");?>value="3">3</option>
                                        <option <?php select($sup,"6");?>value="6">6</option>
                                        <option <?php select($sup,"8");?>value="8">8</option>
                                        <option <?php select($sup,"14");?>value="14">14</option>
                                        <option <?php select($sup,"29");?>value="29">29</option>
                                    </select>
                                </div>
                                <!-- EMBAUCHE -->
                                <div class="form-group">
                                    <label for="Emb">Embauche</label>
                                    <input type="date" class="form-control" name="embauche" value="<?php echo $emb ?>" required>
                                </div>
                                <!-- SALAIRE -->
                                <div class="form-group">
                                    <label for="Sal">Salaire</label>
                                    <input type="text" class="form-control" name="sal" value="<?php echo $sal ?>" required>
                                </div>
                                <!-- COMMISION -->
                                <div class="form-group">
                                    <label for="Comm">Commission</label>
                                    <input type="text" class="form-control" name="comm" value="<?php echo $comm ?>">
                                </div>
                                <!-- NUMERO SERVICE -->
                                <div class="form-group">
                                    <label for="NoServ">Numéro de service</label>
                                    <select class="form-control form-control-lg" name="noService" value="<?php echo $noServ ?>" required>
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
                                    <label for="noProj">Numéro de projet</label>
                                    <select class="form-control form-control-lg" name="noProj" value="$noProj">
                                        <option <?php select($noProj,NULL); ?>></option>
                                        <option <?php select($noProj,101); ?> value="101" >101</option>
                                        <option <?php select($noProj,102); ?> value="102" >102</option>
                                        <option <?php select($noProj,103); ?> value="103" >103</option>
                                    </select>
                                </div>

                                <input name="modify" type="submit" class="btn btn-primary mb-3" value="Modifier"/>
                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
                <?php 
            }
        ?> 
    </body>
</html>