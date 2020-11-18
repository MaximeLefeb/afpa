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

//* DOM exo 4 JS --------------------------------------------------------
//Var
var fieldset   = document.createElement('fieldset');
var legend     = document.createElement('legend');
var legendText = document.createTextNode('Uploader une image');
var center     = document.createElement('center');
var labelText = document.createTextNode('Image a uploader');
var enfantBody = document.body.firstChild;

var mainDiv2 = document.createElement('div');
    mainDiv2.id = 'divTP2';

var form = document.createElement('form');
    form.enctype = 'multipart/form-data';
    form.method  = 'post';
    form.action  = 'upload.php';

var label = document.createElement('label');
    label.for = 'inputUpload';

var input      = document.createElement('input');
    input.type = 'file';
    input.name = 'inputUpload';
    input.id   = 'inputUpload';

var br = document.createElement('br');
var submit = document.createElement('input');
    submit.type = 'submit';
    submit.value = 'Envoyez';

center.appendChild(label);
center.appendChild(input);
center.appendChild(br);
center.appendChild(br.cloneNode(false));
center.appendChild(submit);
center.setAttribute('style', 'text-align: center');
legend.appendChild(legendText);
fieldset.appendChild(legend);
fieldset.appendChild(center);
form.appendChild(fieldset);
mainDiv2.appendChild(form);

body = document.getElementsByTagName('body');
document.body.insertBefore(mainDiv2,enfantBody);
