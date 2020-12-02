$("#nameInput").on('input',function(e) {
    e.preventDefault();
    let search = $(this).val().toUpperCase();
    let url = "../Divers/searchbox.php?nom=" + search ;  

    $.getJSON(url, function(data) {
        const d = $.Deferred();
        let response = data;
        $("tbody").empty();
        $.each(data, function(cle, valeur) {
            $("<tr>").append(
                $("<td>").html(valeur.Id), 
                $("<td>").html(valeur.Nom), 
                $("<td>").html(valeur.Prenom), 
                $("<td>").html(valeur.Emploi), 
                $("<td>").html(valeur.Superieur), 
                $("<td>").html(valeur.Embauche), 
                $("<td>").html(valeur.Salaire), 
                $("<td>").html(valeur.Commission), 
                $("<td>").html(valeur.noProjet), 
                $("<td>").html(valeur.noService),
                $("<td>").append($("<a>").attr({type:'button', class:'btn btn-primary',href:'#'}).html('Modifier')),
                $("<td>").append($("<a>").attr({type:'button', class:'btn btn-danger', href:'#'}).html('Supprimer'))).appendTo($("tbody"));
        });

        d.resolve(response);

    });
});

$("#lastnameInput").on('input', function(e) {
    e.preventDefault();
    let searchedJson = $(this).val().toUpperCase();
    console.log(searchedJson);

    $.ajax({
        url: "../Controleur/controleur_searchbox.php",
        type: "POST",
        data: {prenom:searchedJson},
        success: function(data) {
            console.log(data);
        },
        error: function(e) {
            console.log(e.message);
        }
    });

    //TODO getJSON 

});
