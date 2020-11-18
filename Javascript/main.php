<!DOCTYPE html>
<html>
    <head>
        <title>Exercices JS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOOTSTRAP -->
        <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
            crossorigin="anonymous">
        <!-- CSS -->
        <style>
            #divTP1 {
                display:none;
            }
        </style>
    </head>

    <body>
        <button id="Afficher" class="btn btn-primary m-5">Afficher</button>

        <div class="ml-5">
            <div class="form-check form-check-inline">
                <input class="form-check-input checkButton" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input checkButton" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input checkButton" type="checkbox" id="inlineCheckbox3" value="option3">
                <label class="form-check-label" for="inlineCheckbox3">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input checkButton" type="checkbox" id="inlineCheckbox4" value="option4">
                <label class="form-check-label" for="inlineCheckbox4">4</label>
            </div>
            <button id="checkAll" class="btn btn-primary">Check All</button>
            <button id="uncheckAll" class="btn btn-primary">Uncheck All</button>
        </div>

        <script
			src         ="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin ="anonymous">
        </script>
        <script 
            src="script.js">
        </script>
    </body>
</html>