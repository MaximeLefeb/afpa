<?php 
    //*SI SUP D'AU MOINS 1 EMPLOYE DESACTIVER DELETE BUTTON
    function disabled(Array $ListSup, Int $idEmp) :?Bool{
        foreach ($ListSup as $sup) {
            if ($idEmp == $sup->getId()) {
                return true;
            }
        } 

        return null;
    }

    //*PRINT TD TABLEAU
    function printTd(Employe $value) : Void {    
        echo '<td>' . $value->getId() . '</td>
            <td>' . $value->getNom() . '</td>
            <td>' . $value->getPrenom() . '</td>
            <td>' . $value->getEmp() . '</td>
            <td>' . $value->getSup() . '</td>
            <td>' . $value->datetimeToString($value->getEmb()) . '</td>
            <td>' . $value->getSal() . '</td>
            <td>' . $value->getComm() . '</td>
            <td>' . $value->getNoServ() . '</td>
            <td>' . $value->getNoProj() . '</td>';
    }

    //*PRINT ARRAYBUTONS
    function printArrayButton(Array $ListSup, Int $idEmp) :Void {
        echo "<td><a type='button' class='btn btn-primary' href='../Controleur/controleur_form_Employe.php?action=modify&id=$idEmp;'>Modifier</a></td>";
        echo "<td>"; if(!disabled($ListSup, $idEmp)) {  echo "<a type='button' class='btn btn-danger' href='../Controleur/controleur_Employe.php?action=delete&id=$idEmp'>Supprimer</a>"; } echo "</td>";
    }

    //*PRINT TH TABLEAU
    function printTableHeader() : Void { 
        ?>
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
        <?php if(ifAdmin()) { echo "<th scope='col'>Modifier</th> <th scope='col'>Supprimer</th>"; }
    }

    //*PRINT TABLEAU D'EMPLOYES
    function printEmployeArray(Array $dataEmp, Array $ListSup) :Void {
        $i = 1;
        foreach ($dataEmp as $key => $value) {
            echo "<tr id='trNo$i'>";
                printTd($value);
                if(ifAdmin()) {
                    printArrayButton($ListSup, $value->getId());
                }
            echo "</tr>";
            $i++;
        }
    }

    //*VERIF SI ADMIN
    function ifAdmin() :Bool {
        if ($_SESSION['tou'] == 'Administrateur') {
            return true;
        }
        return false;
    }

    //*AFFICHER LA PAGE 
    function afficherPageEmploye(Array $dataEmp, Array $ListSup, Exception $e = NULL) :Bool {
        if ($e) {
            echo "Error -> " . $e->getMessage() . ". Code : " . $e->getCode();
            return 1;
        }

        ?>
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Tableau employes</title>
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
                        cursor         : not-allowed !important;
                        opacity        : 0.5;
                        text-decoration: none;
                    }
                    #tableau {
                        -webkit-box-shadow: 0px 0px 22px 6px rgba(0,0,0,0.75);
                        -moz-box-shadow: 0px 0px 22px 6px rgba(0,0,0,0.75);
                        box-shadow: 0px 0px 22px 6px rgba(0,0,0,0.75);
                        vertical-align:middle;
                    }
                    td{
                        vertical-align:middle !important;
                    }
                </style>
            </head>

            <body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <h1>Aujourd'hui $i employes ont été ajouté à la base de données</h1>
                        </div>
                    </div>
                   
                    <div class="row">
                        <!-- SEARCH BY LASTNAME -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="lastname" class="form-control" id="nameInput" type="text" placeholder="Recherche par nom...">
                        </div>
                        <!-- SEARCH BY NAME -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="nameInput" class="form-control" id="lastnameInput" type="text" placeholder="Rechercher par prénom...">
                        </div>
                        <!-- SEARCH BY EMPLOI -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="emploiInput" class="form-control" id="emploiInput" type="text" placeholder="Rechercher par emploi...">
                        </div>
                        <!-- SEARCH BY DATE -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="embaucheInput" class="form-control" id="dateInput" type="date" placeholder="Rechercher par date d'embauche...">
                        </div>
                        <!-- SEARCH BY NOPROJ -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="noProjInput" class="form-control" id="noProjInput" type="number" placeholder="Rechercher par numéro de projet...">
                        </div>
                        <!-- SEARCH BY SERVICE NAME -->
                        <div class="col-sm-2 mt-3 mb-3">
                            <input name="serviceNameInput" class="form-control" id="serviceNameInput" type="text" placeholder="Rechercher par nom de service...">
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">    
                        <div class="col-sm-12 mb-3">
                            <table id="tableau" class="table table-striped table-dark mt-3">
                                <thead class="text-center">
                                    <?php printTableHeader(); ?>
                                </thead>
                            
                                <tbody class="text-center">
                                    <?php printEmployeArray($dataEmp, $ListSup); ?>
                                </tbody>
                            </table>

                            <div class="text-center">
                                <a href="../Controleur/controleur_form_Employe.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                                <a href="../Controleur/controleur_Service.php?action=showServ"><button type="submit" class="btn btn-primary">Voir la table service</button></a>
                                <a href="../Divers/Acceuil.php"><button type="submit" class="btn btn-primary">Retour à l'acceuil</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous">
                </script>
                <script src="../Divers/script.js"></script>
            </body>
        </html>
        <?php 
        return 0;
    }
?>