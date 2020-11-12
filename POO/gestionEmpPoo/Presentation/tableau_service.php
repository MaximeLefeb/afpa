<?php
    session_start();

    if (!$_SESSION) {
        header('location: formLogin.php');
    }

    include_once '../Controleur/controleur_Service.php';
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-striped table-dark">
                        <thead class="text-center">
                            <tr>
                                <?php printServTableHeader(); ?>
                            </tr>
                        </thead>
                    
                        <tbody class="text-center">
                            <?php printServiceArray(); ?>
                        </tbody>
                    </table>

                    <a href="form_add_service.php?action=ajouter"><button type="submit" class="btn btn-primary">+ Ajouter un service</button></a>
                    <a href="tableau_employe.php"><button type="submit" class="btn btn-primary">Voir la table employes</button></a>

                </div>
            </div>
        </div>
    </body>
</html>