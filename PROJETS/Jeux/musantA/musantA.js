$("<canvas>").attr("id", "character").appendTo("body");
//! CONFIG
let character      = $("#character");
let characterSprite = new Image();
let borderMap_Y    = $(document).height();
let borderMap_X    = $(document).width();
let character_posY = parseInt(character.css('top'));
let character_posX = parseInt(character.css('left'));
let map = {
    'z' : false,
    's' : false,
    'q' : false,
    'd' : false,
    'i' : false
}

/* characterSprite.onload = animate;
characterSprite.src = "sprite/character.png";
context.imageSmoothingEnabled = false; */

function consolePosition() {
    console.log("Y : " + character_posY + "px");
    console.log("X : " + character_posX + "px");
}

character.click(function(e) {
    alert();
});

//* CONTROLS -> UP : Z | DOWN : S | LEFT : Q |RIGHT : A 
$(document).keydown(function (event) {
    if (event.key in map) {
        map[event.key] = true;
        
        if (map['z']) {
            if (character_posY <= 0) {
                return;
            }
            moveCharacterUp();
        }

        if (map['s']) {
            if (character_posY >= (borderMap_Y - 100)) {
                return;
            }
            moveCharacterDown();
        }

        if (map['q']) {
            if (character_posX <= 0) {
                return;
            }
            moveCharacterLeft();
        }

        if (map['d']) {
            if (character_posX >= (borderMap_X - 100)) {
                return;
            }
            moveCharacterRight();
        }

        if (map['i']) {
            inventory();
        }
    }
}).keyup(function (event) {
    if (event.key in map) {
        map[event.key] = false;
    }
});

function moveCharacterUp() {
    character_posY-=10;
    character.css({"top": character_posY + "px"});
}
function moveCharacterDown() {
    character_posY+=10;
    character.css({"top": character_posY + "px"});
}
function moveCharacterLeft() {
    character_posX-=10;
    character.css({"left": character_posX + "px"});
}
function moveCharacterRight() {
    character_posX+=10;
    character.css({"left": character_posX + "px"});
}

function collision() {
    //TODO 
}

function healBar() {
    //TODO
}

function inventory() {
    $('#inventory').toggle(function () {
        $('#inventory').css('visibility', 'visible');
    });
}

/* function CharacterAnimation() {
    draw();
    update();
    requestAnimationFrame(animate);
}

function draw() {
    context.clearRect(0,0, width, height);
    draw(x,y);
}

function drawCharacter() {
    context.drawImage(characterSprite, 0, 0, 100, 100, 50, 50);
}

function update() {
    drawCharacter();
} */
