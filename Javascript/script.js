//* exo 1
/* var number = 5;
console.log(number);*/

//* exo 2
/* var a = 5;
var b = 10;

if (a < b) {
    console.log('5 < 10');
}*/

//* exo 3
function isPaire(chiffre) {
    if (chiffre % 2 != 0) {
        console.log('le chiffre ' + chiffre + ' est impaire');
    } else {
        console.log('le chiffre ' + chiffre + ' est paire');
    }
}

//* exo 4
function factorielle(nombre) {
    for (i = 0; i < nombre; i++) {
        console.log(nombre + ' x ' + i + ' = ' + nombre * i);
    }
}
// factorielle(15);

//* exo 5
function tableDeMultiplication(nombre) {
    for (i = 0; i <= 10; i++) {
        console.log(nombre + ' x ' + i + ' = ' + nombre * i)
    }
}
//tableDeMultiplication(10);

function factorielleRecursive(nombre) {
  if (nombre === 0) {
    return 1;
  }

  return nombre * factorielleRecursive(nombre-1);
}
//console.log(factorielleRecursive(9));

//* DOM JQUERY ----------------------------------------------------------
    /*
    $("body").append("<div></div>");
    
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
    */

    //? document.getQuerySelector("#afficher").addEventListener('click', function(e){
    //?     document.getElementById('divTP1').toggle("fast");
    //?});

    //?$("#Afficher").click(function(e) {
    //?    $("#divTP1").toggle("fast");
    //?});

    
//* DOM exo  JS ---------------------------------------------------------
/*
var FormAttributes = {
    action  = 'upload.php',
    method  = 'post.php',
    enctype = 'multipart/form-data'
};

var InputAttributes = {
    type = 'file',
    name = 'upload',
    id   = 'inputUpload'
};

var submitAttributes = {
    type  = 'submit',
    value = 'Envoyer'
};

var mainDiv2   = document.createElement('div'); mainDiv2.id = 'divTP2';
var legendText = document.createTextNode('Uploader une image');
var fieldset   = document.createElement('fieldset');
var legend     = document.createElement('legend');
var center     = document.createElement('center'); center.setAttribute('style', 'text-align: center');
var br         = document.createElement('br');
var label      = document.createElement('label'); label.for = 'inputUpload';
var body       = document.getElementsByTagName('body');
var enfantBody = document.body.firstChild;

legend.appendChild(legendText);
legend.appendChild(legendText);
fieldset.appendChild(center);
form.appendChild(fieldset);
center.appendChild(label);
//TODO createAndAppendElement(); INPUT ATTRIBUTES
center.appendChild(br);
center.appendChild(br.cloneNode(false));
//TODO createAndAppendElement(); SUBMIT ATTRIBUTES
//TODO createAndAppendElement(); FORM ATTRIBUTES 
document.body.insertBefore(mainDiv2,enfantBody);

function createAndAppendElement(parent, tagName, attributes) {
    var Element = document.createElement(tagName);
    var entries = Object.entries(attributes);

    for(var [key, value] of entries) {
        Element[key] = value;
    }

    parent.appendChild(Element);
    return Element;
}
*/

//* EXO SHOW/HIDE CONTENT W/ EVENT -----------------------------------------
//? document.getQuerySelector("#afficher").addEventListener('click', function(e){
//?     document.getElementById('divTP1').toggle("fast");
//?});

$("#Afficher").click(function(e) {
    $("#divTP1").toggle("fast");
});

//* EXO CHECKBOX
//TODO TRANSFORM TO JS
$("#checkAll").click(function(e) {
    $(".checkButton").attr("checked", "checked");
});
$("#uncheckAll").click(function(e) {
    $(".checkButton").removeAttr("checked");
});

//*EXO REMOVE BR
$("#deleteBRElement").click(function(e) {
    $("br").remove();
});

//* EXO TD TO INPUT TEXT
//TODO TRANSFORM TO JS
$("td").click(function(e) {
    tdContent = $(this).val();
    console.log(tdContent);
});