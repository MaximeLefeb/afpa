//* DOM JQUERY ----------------------------------------------------------
/* $("body").append("<div></div>");

$("div").attr("id", "divTP1").append("Le ");
createStrong('World World Web Consuprtion', '#divTP1');

$("#divTP1").append(", abrégé par le sigle ");
createStrong('W3C', '#divTP1');

$("#divTP1").append(", est un ");
createALink('organisme de strandardisation ','http://fr.wikipedia.org/Organisme_de_normalisation','organisme de strandardisation','#divTP1');

$("#divTP1").append("à but non-lucratif chargé de promouboir la compatibilité des technologies du ");
createALink('World_Wide_Web.','http://fr.wikipedia.org/World_Wide_Web','World_Wide_Web','#divTP1');

function createStrong(contenue,appendItem) {
    return $("<strong>"+contenue+"</strong>" ).appendTo(appendItem);
}
function createALink(contenue,lien,titre,appendItem) {
    return $("<a>"+contenue+"</a>").attr({href:lien,title:titre}).appendTo(appendItem);
}

$("#Afficher").click(function(e) {
    $("#divTP1").toggle("fast");
})
 */
    
//* EXO SHOW/HIDE CONTENT W/ EVENT -----------------------------------------
/* $("#Afficher").click(function(e) {
    $("#divTP1").toggle("fast");
}); */

//* EXO CHECKBOX ----------------------------------------------------------
/* $("#checkAll").click(function(e) {
    $(".checkButton").attr("checked", "checked");
});
$("#uncheckAll").click(function(e) {
    $(".checkButton").removeAttr("checked");
}); */

//*EXO REMOVE BR ---------------------------------------------------------
/* $("#deleteBRElement").click(function(e) {
    $("br").remove();
}); */ 

//* EXO TD TO INPUT TEXT -------------------------------------------------
/* $("td").click(function(e) {
    var tdContent = $(this).text();
    $(this).replaceWith("<input id='modifTable' type='text'/>");
    $("#modifTable").val(tdContent);

    $("#modifTable").keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            $(this).replaceWith("<td>" + $("#modifTable").val() + "</td>");
        }
    });
});  */

//* EXO JQUERY-------------------------------------------------------------
//*exo 1
$("p").css("color","red");
//*exo 2
$("#ggl").attr("href");
$("#ggl").attr("hreflang");
$("#ggl").attr("rel");
$("#ggl").attr("target");
$("#ggl").attr("type");

function modifyCell(row, col, TextContent) {
    $("tr").eq(row - 1).children().eq(col - 1).html(TextContent);
}
//*exo 3
$("#valider").click(function(){
    modifyCell($("#row").val(), $("#col").val(), $("#text").val());

    //*exo 4
    const table = $("<table border='1'>");
    for (let i = 0; i < row; i++) {
        const tr = $("<tr>");
        for (let j = 0; j < col; j++) {
            tr.apprend($("<td>").html(i + "-" + j));
        }
        table.append(tr);
    }
    $("body").append(table);
});

//*exo 5
const options = $("#colorSelect").children();
$("#remove-btn").on("click", function(e){
    options.remove();
});