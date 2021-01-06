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
            href="Main.css">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
            crossorigin="anonymous">
        <link 
            href="https://fonts.cdnfonts.com/css/caviar-dreams" 
            rel="stylesheet">
        <title>Météo - France</title>
    </head>

    <body>
        <div class="container-fluid text-center mt-5 mb-5">
            <div class="row">
                <div class="col-4"></div>
                
                <div class="col mt-5 p-5" id="main">
                    <h1>D2WM - MÉTÉO</h1>

                    <select name="ville" id="villeSelector" class="form-control form-control-lg">
                        <option value="">-- Sélectionnez une ville --</option>
                        <option value="Lille">Lille</option>
                        <option value="paris">Paris</option>
                        <option value="montpelier">Montpelier</option>
                        <option value="toulouse">Toulouse</option>
                        <option value="marseille">Marseille</option>
                        <option value="reims">Reims</option>
                        <option value="strasbourg">Strasbourg</option>
                        <option value="nancy">Nancy</option>
                    </select>

                    <hr>

                    <div id="weather_result">
                        <div>ville</div>
                        <div>temps</div>
                        <div>degrès</div>
                    </div>

                    <img id ="weatherPicto" src="#">

                </div>

                <div class="col-4"></div>
            </div>
        </div>
        

        <!-- SCRIPT -->
        <script 
            src="https://code.jquery.com/jquery-3.5.1.min.js" 
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
            crossorigin="anonymous">
        </script>
        <script 
            src="script.js">
        </script>
    </body>
</html>