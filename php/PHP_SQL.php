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

            //* TRAITEMENT AJOUT
            //! WITHOUT FUNCTION
            /*if (isset($_POST['add'])) 
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
                    
                    if($comm == '0')$comm = 'NULL';
                    if($noProj == "Aucun")$noProj = 'NULL';

                    //*REQUETE SQL ADD
                    $AddRequest = "INSERT INTO employes(id, Nom, Prenom, Emploi, Sup, Embauche, Sal, Comm, NoService, NoProj) VALUES (NULL,UPPER('$nom'),UPPER('$prenom'),'$emp','$sup',$emb,$sal,$comm,$noServ,$noProj)";

                    if(mysqli_query($db, $AddRequest)){
                        ?><script>alert("Add ok");</script><?php
                    }else{
                        ?><script>alert("Erreur lors de l'ajout en base de données");</script><?php
                    }
                } 
            } */
            //* TRAITEMENT SUPRESSION
            //! WITHOUT FUNCTION
            /*else if ($_GET) 
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
            } */
            //* TRAITEMENT MODIFICATION
            //! WITHOUT FUNCTION
            /*else if (isset($_POST['modify'])) 
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

            } */
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
                                $i = 1;
                                $noSup = "SELECT DISTINCT e.id FROM `employes` AS e INNER JOIN `employes` AS e1 WHERE e.id=e1.sup";
                                $dbServ = connexionBDD();
                                if($WhoIsSup = mysqli_query($dbServ, $noSup)){
                                    $y=1;
                                }else{
                                    echo "<script>alert('getSup Dead');</script>";
                                }

                                foreach ($dataEmp as $key => $value) {
                                    echo "<tr id=trNo-".$i.">";
                                    foreach ($value as $k => $v) {
                                        echo "<td>$v</td>";
                                    }

                                    if ($value["Sup"] == $WhoIsSup) {
                                        ?><td><a type='button' class='btn btn-primary' href='formAdd.php?action=modify&id=<?php echo $value["id"];?>'>test</a></td>
                                        <td><a type='button' class='btn btn-danger' href='PHP_SQL.php?action=delete&id=<?php echo $value["id"];?>'>test</a></td><?php
                                    } else {
                                        ?><td><a type='button' class='btn btn-primary' href='formAdd.php?action=modify&id=<?php echo $value["id"];?>'>Modifier</a></td>
                                        <td><a type='button' class='btn btn-danger' href='PHP_SQL.php?action=delete&id=<?php echo $value["id"];?>'>Supprimer</a></td><?php
                                    }

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