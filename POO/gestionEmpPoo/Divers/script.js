$("#nameInput").on('input',function(e) {
    e.preventDefault();
    let search = $(this).val().toUpperCase();
    let url = "../Divers/searchbox.php?nom=" + search ;  

    $.getJSON(url, function(data) {
        const d = $.Deferred();
        maReponse = data;
        $("tbody").empty();
        $.each(data, function(cle, valeur) {
            console.log(valeur);
            //* PRINT ARRAY 
            $("<tr>").append($("<td>").html(valeur.Id), 
                            $("<td>").html(valeur.Nom), 
                            $("<td>").html(valeur.Prenom), 
                            $("<td>").html(valeur.Empoi), 
                            $("<td>").html(valeur.Superieur), 
                            $("<td>").html(valeur.Embauche), 
                            $("<td>").html(valeur.Salaire), 
                            $("<td>").html(valeur.Commission), 
                            $("<td>").html(valeur.noProjet), 
                            $("<td>").html(valeur.noService)).appendTo($("tbody"));
        });
        d.resolve(maReponse);
    });
});