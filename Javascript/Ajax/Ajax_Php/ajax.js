/* function afficher(txtdocument) { 
	var target = document.getElementById("affichage"); 
	target.innerHTML = txtdocument; 
} 
var xhr = null;  

function extraire(){ 
	if(window.XMLHttpRequest) { 
		xhr = new XMLHttpRequest(); 
	} 
	else if(window.ActiveXObject){  
		xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
	}  
	else{  
		alert("Votre navigateur n’est pas compatible avec AJAX...");  
	}  
	if(xhr) { 
		xhr.onreadystatechange = function(){ 
			if(xhr.readyState == 4 && xhr.status == 200){ 
				var txtdocument = xhr.responseText; 
				afficher(txtdocument); 
			} 
		} 
	} 
	xhr.open("GET", "test.txt", true);  
	xhr.send(null);  
}  */

//* Exo 1 AJAX
//?Afficher Hello World via un bouton ajax
/* $("#bonjour").click(function(e) {
	$.ajax('HelloWorld.php',
		{
			success: function(response){
				$("body").append(response);
			},

			error: function(JqXhr, errorText, textstatus) {
				console.log(JqXhr, errorText, textstatus);
			}
		}
	)
}); */

//* Exo 2 AJAX
//?Load les options d'un select grace à ajax
/* $.ajax('HelloWorld.php',
	{
		success: function(response){
			$("#selecter").load(response);
			console.log(response);
		},

		error: function(JqXhr, errorText, textstatus) {
			console.log(JqXhr, errorText, textstatus);
		}
	}
)  */

//* Exo 3 AJAX
//?Formulaire connexion sans action verifier la validiter des champs lors du input valider
/* $("#form").on("submit", function (e) {
    e.preventDefault();
    const prenomInput =$("#input-prenom").val();
    const nomInput =$("#input-nom").val();
    if (prenomInput && nomInput) {
        $("<div>").attr({class : "alert alert-success", role:"alert"}).html("formulaire correctement rempli").appendTo($("#message").empty());
        $.post('test.php', 
        {prenom : prenomInput, nom : nomInput}, 
        function() {
            alert("insertion effectuée");
        })
    } else {
        $("<div>").attr({class : "alert alert-danger", role:"alert"}).html("formulaire non rempli").appendTo($("#message").empty());
    }
}); */

//* Exo 4 AJAX
//? Marque unlock Modele select
$("tbody").load("test.php");

$("#selecterMarque").on("change", function(e){
	const marqueSelectionnee = $("#selecterMarque :selected").val();
    if(marqueSelectionnee){
		$("#selecterModele").load("test.php?marque=" + marqueSelectionnee);
        $("tbody").load("test.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    } else {
        $("#selecterModele").load("test.php?marque=");
        $("tbody").load("test.php")
    }
});

$("#selecterModele").on("change", function(e){
    const modeleSelectionne = $("#selecterModele :selected").val();
    const marqueSelectionnee = $("#selecterMarque option:selected").val();
    if(modeleSelectionne) {
        $("tbody").load("test.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne + "&afficher=tableau");
    } else {
        $("tbody").load("test.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    }
});