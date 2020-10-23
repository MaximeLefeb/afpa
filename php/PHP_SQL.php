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
            $db = mysqli_init();
            mysqli_real_connect($db, 'localhost','root','','societe');
            $rs = mysqli_query($db, 'SELECT * FROM employes');
            $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);

            //* TRAITEMENT AJOUT
            if (isset($_POST['add'])) 
			{
                if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emploi']) && 
                    isset($_POST['sup']) && isset($_POST['embauche']) && isset($_POST['sal']) &&
                    isset($_POST['comm']) && isset($_POST['noService'])&& isset($_POST['noProj']))
				{
                    $nom    = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $emp    = $_POST['emploi'];
                    $sup    = $_POST['sup'];
                    $emb    = $_POST['embauche'];
                    $sal    = $_POST['sal'];
                    $comm   = $_POST['comm'];
                    $noServ = $_POST['noService'];
                    $noProj = $_POST['noProj'];
                    
                    //*REQUETE SQL ADD
                    $AddRequest = "INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER('$nom'),UPPER('$prenom'),'$emp','$sup',$emb,$sal,$comm,$noServ,$noProj)";
                    echo $AddRequest;
                    if(mysqli_query($db, $AddRequest)){
                        ?><script>alert("Add ok");</script><?php
                    }else{
                        ?><script>alert("Erreur lors de l'ajout en base de données");</script><?php
                    }
                } 
            }
            //* TRAITEMENT SUPRESSION
            else if ($_GET) 
            {   
                if ($_GET["action"]=="delete" ) {
                    if (!empty($_GET['id'])) {
                        $id = $_GET['id'];

                        //*REQUETE SQL DEL
                        $DeleteRequest = "DELETE FROM employes WHERE id = $id";

                        if (mysqli_query($db, $DeleteRequest)) {
                            ?><script>alert("Delete ok");</script><?php
                        }else{
                            ?><script>alert("Erreur lors de la suppression");</script><?php
                        }
                    }
                }
            }
            //* TRAITEMENT MODIFICATION
            else if (isset($_POST['modify'])) 
            { 
                if (isset($_POST['id']) &&isset($_POST['nom']) && 
                    isset($_POST['prenom']) && isset($_POST['emploi']) && 
                    isset($_POST['sup']) && isset($_POST['embauche']) && 
                    isset($_POST['sal']) && isset($_POST['comm']) && 
                    isset($_POST['noService'])&& isset($_POST['noProj']))
				{
                    $id     = $_POST['id'];
                    $nom    = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $emp    = $_POST['emploi'];
                    $sup    = $_POST['sup'];
                    $emb    = $_POST['embauche'];
                    $sal    = $_POST['sal'];
                    $comm   = $_POST['comm'];
                    $noServ = $_POST['noService'];
                    $noProj = $_POST['noProj'];

                    //*REQUETE SQL MODIFY
                    $ModiFyRequest = "UPDATE `employes` SET Nom=UPPER('$nom'), Prenom=UPPER('$prenom'), Emploi='$emp', Sup='$sup', Embauche='$emb', Sal='$sal', Comm='$comm', NoService='$noServ', NoProj='$noProj' WHERE id = $id";

                    if (mysqli_query($db, $ModiFyRequest)) {
                        ?><script>alert("Modif ok");</script><?php
                    }else{
                        ?><script>alert("Echec de la modif");</script><?php
                    }
                }else{
                    echo "Erreur Isset";
                }
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-10 mb-5">
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
                                    $i = 1;
                                    foreach ($data as $key => $value) {
                                        echo "<tr id=trNo-".$i.">";
                                        foreach ($value as $k => $v) {
                                            echo "<td>$v</td>";
                                        }?>
                                        <td><a type='button' class='btn btn-primary' href='formAdd.php?action=modify&id=<?php echo $value["id"]; ?>'>Modifier</a></td>";
                                        <td><a type='button' class='btn btn-danger' href='PHP_SQL.php?action=delete&id=<?php echo $value["id"]; ?>'>Supprimer</a></td>";
                                        </tr>;<?php 
                                        $i++;
                                    }                        
                                ?>
                            </tbody>
                        </table>
                        <a href="formAdd.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                        <a href="servTable.php"><button type="submit" class="btn btn-primary">Voir la table service</button></a>
                    </div><?php
                  
                ?><div class="col-sm-1"></div>
            </div>
        </div>
    </body>
</html>