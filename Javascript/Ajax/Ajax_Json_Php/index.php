<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta 
            charset="UTF-8">
        <meta 
            name="viewport" 
            content="width=device-width, initial-scale=1.0">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
            crossorigin="anonymous">
        <title>Order By Select</title>
    </head>

    <body>
        <select name="marque" id="marque">
            <option value="">-- Sélectionnez une marque --</option>
            <option value="RENAULT">RENAULT</option>
            <option value="CITROEN">CITROEN</option>
            <option value="FORD">FORD</option>
        </select>

        <select name="modele" id="modele">
            <option value="">-- Sélectionnez un modèle --</option>
        </select>

        <div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Carburant</th>
                    </tr>
                </thead>
                
                <tbody>
                    <!-- CONTENT -->
                </tbody>
            </table>
        </div>
        

        <!-- SCRIPT -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <script 
            src="script.js">
        </script>
    </body>
</html>