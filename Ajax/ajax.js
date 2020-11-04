function afficher(txtdocument) { 
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
	xhr.open("GET", "test.txt", true);  
	xhr.send(null);  
	} 
} 