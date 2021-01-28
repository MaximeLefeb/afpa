let maReponse;
const p = doGetJson("db_voitures.php", false);

p.done(function(maReponse) {
    console.log("3. Fin de l'exécution de l'appel AJAX ..", "données retournées : ", maReponse);
    console.log("4. C'est la fin Good bye !! ..");
    console.log("5. Dégage !! ..");
})

$("#marque").on("change", function(e) {
    const marqueSelectionnee = $("#marque :selected").val();
    let url = marqueSelectionnee ? "db_voitures.php?marque=" + marqueSelectionnee : "db_voitures.php";
    $("#modele").empty().append($("<option value=''>").html("-- Sélectionnez un modèle --"));
    doGetJson(url, true);
})

$("#modele").on("change", function(e) {
    const modeleSelectionne = $("#modele :selected").val();
    const marqueSelectionnee = $("#marque option:selected").val();
    let url = modeleSelectionne ? "db_voitures.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne : "db_voitures.php?marque=" + marqueSelectionnee;
    doGetJson(url, false);
})

function doGetJson(url, isSelect) {
    console.log("1. Début de l'exécution de l'appel AJAX ..");
    const d = $.Deferred();
    $.getJSON(url, function(data) {
        console.log("2. Exécution de l'appel AJAX en cours ..");
        maReponse = data;
        $("tbody").empty();
        $.each(data, function(cle, valeur) {
            if(isSelect) {
                $("#modele").append($("<option value='" + valeur.modele + "'>").html(valeur.modele));
            }
            $("<tr>").append(
                $("<td>").html(valeur.marque), 
                $("<td>").html(valeur.modele), 
                $("<td>").html(valeur.carburant)).appendTo($("tbody"));
        });
        d.resolve(maReponse);
    })

    return d.promise();
    
}




