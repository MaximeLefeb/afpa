<?php 
    //*DISABLED DELETE BUTTON SI NON ADMIN
    function disabled(Int $valueID) :?Bool{
        $data = service_Employe::service_selectSup();

        foreach ($data as $sup) {
            foreach ($sup as $nbSup) {
                if ($valueID == $nbSup) {
                    return true;
                }
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
    function printArrayButton(Int $id) :Void {
        echo "<td><a type='button' class='btn btn-primary' href='../Presentation/form_add_employe.PHP?action=modify&id=$id;'>Modifier</a></td>";
        echo "<td>"; if(!disabled($id)) {  echo "<a type='button' class='btn btn-danger' href='../Controleur/controleur_Employe.php?action=delete&id=$id'>Supprimer</a></button>"; } echo "<td>";
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
    function printEmployeArray(Array $dataEmp) :Void {
        $i = 1;
        foreach ($dataEmp as $key => $value) {
            echo "<tr id='trNo$i'>";
                printTd($value);
                printArrayButton($value->getId());
            echo "</tr>";
            $i++;
        }
    }

    //*VERIF SI ADMIN
    function ifAdmin() :Bool {
        if ($_SESSION['tou'] == 'Administrateur') {
            return true;
        }
    }

    //*AFFICHER LA PAGE 
    function afficherPageEmploye(Array $dataEmp) :Void {
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
                <!-- CSS -->
                <style>
                    .isDisabled {
                        color          : currentColor;
                        cursor         : not-allowed !important;
                        opacity        : 0.5;
                        text-decoration: none;
                    }
                </style>
            </head>

            <body>
                <div class="container-fluid">
                    <div class="row">    
                        <div class="col-sm-12 mb-3">
                            <table class="table table-striped table-dark">
                                <thead class="text-center">
                                    <?php printTableHeader(); ?>
                                </thead>
                            
                                <tbody class="text-center">
                                    <?php printEmployeArray($dataEmp); ?>
                                </tbody>
                            </table>

                            <a href="../Presentation/form_add_employe.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un employes</button></a>
                            <a href="../Controleur/controleur_Service.php?action=showServ"><button type="submit" class="btn btn-primary">Voir la table service</button></a>

                        </div>
                    </div>
                </div>
            </body>
        </html>
        <?php 
    }
?>