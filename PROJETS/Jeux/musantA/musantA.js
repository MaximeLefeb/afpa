$("<canvas>").attr("id", "character").appendTo("body");
//! MAP
let ratio       = window.devicePixelRatio;
let borderMap_Y = $(document).height();
let borderMap_X = $(document).width();
//! CONFIG CHARACTER
let character       = $("#character");
let characterContext= character[0].getContext('2d');
let characterSprite = new Image();
let character_posY  = parseInt(character.css('top'));
let character_posX  = parseInt(character.css('left'));
let step   = 0,
    radius = 40,
    x      = borderMap_X / 2,
    speed  =  radius * 0.2;
//! CONTROLS 
let map = {
    'z' : false,
    's' : false,
    'q' : false,
    'd' : false,
    'i' : false
}

characterSprite.onload = animate;
characterContext.scale(ratio, ratio);
characterSprite.src    = "sprite/characterDown.png";
characterContext.imageSmoothingEnabled = false;

function consolePosition() {
    console.log("Y : " + character_posY + "px");
    console.log("X : " + character_posX + "px");
}

character.click(function(e) {
    alert();
});

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

function animate() {
    draw();
    update();
    requestAnimationFrame(animate);
}

function draw() {
    characterContext.fillRect(0, 0, borderMap_X, borderMap_Y);
    drawCharacter(x, borderMap_Y, radius, Math.floor(step));
}

function drawCharacter(x, y, r, step) {
    var s = r/3;
    characterContext.drawImage(characterSprite, 32*step, 0, 32, 32, x - 16*s, y - 26*s, 32*s, 32*s);
}

function update() {
    x += speed;
    
    if (x < radius || x > borderMap_X - radius) {
        speed *= -1;
    }
    
    step += 0.3;
    if (step >= 3) {
        step -= 3;
    }
}
