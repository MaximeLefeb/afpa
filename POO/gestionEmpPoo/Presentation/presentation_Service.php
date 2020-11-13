<?php 
    //*PRINT TH
    function printServTableHeader() : Void { 
        ?>
        <th scope='col'>idService</th>
        <th scope='col'>Service</th>
        <th scope='col'>Ville</th>
        <?php if(ifAdmin()) { echo "<th scope='col'>Modifier</th> <th scope='col'>Supprimer</th>"; }
    }

    //*PRINT SERVICE ARRAY
    function printServiceArray() :Void {
        $dataServ = searchAllServ();
        $i = 1;
        foreach ($dataServ as $key => $value) {
            echo "<tr id='trNo$i'>";
                printTd($value);
                printServArrayButton($value->getIdService());
            echo "</tr>";
            $i++;
        }
    }

    //*PRINT TD
    function printTd(Service $value) :Void {
       echo '<td>' . $value->getIdService() . '</td>
            <td>' . $value->getService() . '</td>
            <td>' . $value->getVille() . '</td>';
    }

    //*VERIF SI ADMIN
    function ifAdmin() :Bool {
        if ($_SESSION['tou'] == 'Administrateur') {
            return true;
        }
    }

    //*PRINT BUTTONS
    function printServArrayButton(Int $idServ) :Void {
        echo "<td><a type='button' class='btn btn-primary' href='../Presentation/form_add_service.PHP?action=modify&idService=$idServ;'>Modifier</a></td>";
        echo "<td><a type='button' class='btn btn-danger' href='../Controleur/controleur_Service.php?action=delete&idService=$idServ'>Supprimer</a></button><td>";
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
                            <?php printServTableHeader(); ?>
                        </thead>
                    
                        <tbody class="text-center">
                            <?php printServiceArray(); ?>
                        </tbody>
                    </table>

                    <a href="../Presentation/form_add_service.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un Service</button></a>
                    <a href="../Controleur/controleur_Employe.php?action=showEmp"><button type="submit" class="btn btn-primary">Voir la table Employes</button></a>

                </div>
            </div>
        </div>
    </body>
</html>