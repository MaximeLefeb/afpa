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
    
//* DOM exo 2 JS ---------------------------------------------------------
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


//* EXO SHOW/HIDE CONTENT W/ EVENT -----------------------------------------
document.getElementById("afficher").addEventListener('click', function(e){
    document.getElementById('divTP1').toggle("fast");
});

//* EXO CHECKBOX ----------------------------------------------------------
document.QuerySelector("#checkAll").addEventListener('click', function(e){
    document.getElementsByClassName("checkbutton").setAttribute("checked", "checked");
});
document.QuerySelector("#checkAll").addEventListener('click', function(e){
    document.getElementsByClassName("checkbutton").removeAttribute("checked");
});

//*EXO REMOVE BR ---------------------------------------------------------
document.querySelector("#deleteBRElement").addEventListener('click', function(e){
    var br = document.querySelectorAll("br");
    for(i=0; i < br.length; i++) {
        br[i].remove();
    }
}); 


//* EXO TD TO INPUT TEXT --------------------------------------------------
let tdList = document.querySelectorAll('td');
let input = document.createElement('input'); input.id = 'modifTable';

window.addEventListener('load', function() {
    for (i = 0; i < tdList.length; i++) {
        tdList[i].addEventListener('click', function change(e){
            var test = e.target;
            var tdContent = test.innerText;
            this.replaceWith(input);
            document.getElementById("modifTable").value = tdContent;

            document.getElementById("modifTable").addEventListener('focusout', function(e){
                e.preventDefault();
                var td = document.createElement('td');
                this.replaceWith(td);
                td.innerText = this.value;
                td.addEventListener('click', change);
            });
        });
    }
});