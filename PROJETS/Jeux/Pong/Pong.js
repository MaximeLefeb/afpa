    //Cfg
var paddleHeight  = 130;
var startGame     = 0;
var HeightTerrain = window.innerHeight;
var WidthTerrain  = window.innerWidth;
var tab           = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
var ilt           = tab[Math.floor(Math.random() * 10)];
var timer         = 3;
var defaultColor;
    //Paddle J1
var Barre1hauteur  = $("#Barre1").css("height", 130);
var speedOfPaddle1 = 0;
var player1Y       = 360;
var player1X       = 30;
    //Paddle J2
var Barre2hauteur  = $("#Barre2").css("height", paddleHeight);
var speedOfPaddle2 = 0;
var player2Y       = 360;
var player2X       = 30;
    //Ball
var topPositionOfBall  = HeightTerrain / 2 ;
var leftPositionOfBall = WidthTerrain / 2 - 22;
var topSpeedOfBall     = 0;
var leftSpeedOfBall    = 0;
var ballRadius         = 50;
    //Score
var scoreJ1 = $('#scoreJ1');
var scoreJ2 = $('#scoreJ2');
    //mouse
var mousePos = {};

/*onmousemove = function(e){
    console.log("mouse location:", e.clientX, e.clientY)
}*/

 $(document).ready(function(){
        //ColorPicker Joueur 1
    $("#colorJ1").change(function(){
        var clr = $(this).val();
        $("#Barre1").css("background-color",clr);
        $("#Barre1").css("border-color",clr);
        $("#bloc1").css("border-color",clr);
        $("#scoreJ1").css("color",clr);
    });
        //ColorPicker Joueur 2
    $("#colorJ2").change(function(){
        var clr = $(this).val();
        $("#Barre2").css("background-color",clr);
        $("#Barre2").css("border-color",clr);
        $("#bloc2").css("border-color",clr);
        $("#scoreJ2").css("color",clr);
    });
});

function plafond() {
    player1Y += speedOfPaddle1;
    player2Y += speedOfPaddle2;
        //plafond HAUT J1
    if (parseInt($("#Barre1").css('top')) <= 3 ) {
        speedOfPaddle1 = 0;
        player1Y = 1;
    }
        //plafond BAS J1
    if (parseInt($("#Barre1").css('top')) >= HeightTerrain - 190 ) {
        speedOfPaddle1 = 0;
        player1Y = 716;
    }
        //plafond HAUT J2
    if (parseInt($("#Barre2").css('top')) <= 3 ) {
        speedOfPaddle2 = 0;
        player2Y = 1;
    }
        //plafond BAS J2
    if (parseInt($("#Barre2").css('top')) >= HeightTerrain - 190  ) {
        speedOfPaddle2 = 0;
        player2Y = 716;
    }
}
    //Move the player1 up
var movePlayer1Up = function() {
    player1Y -= 10;
    document.getElementById("Barre1").style.top = (player1Y) + "px";
};
    //Move the player1 down
var movePlayer1Down = function() {
    player1Y += 10;
    document.getElementById("Barre1").style.top = (player1Y) + "px";
};
    //Move the player2 up
var movePlayer2Up = function() {
    player2Y -= 10;
    document.getElementById("Barre2").style.top = (player2Y) + "px";
};
    //Move the player2 down
var movePlayer2Down = function() {
    player2Y += 10;
    document.getElementById("Barre2").style.top = (player2Y) + "px";
};

//CONTROLS----------------------------------------------------------------------
document.addEventListener('keydown', function MovePaddleKeyboardDown(event) {
    if (event.key == 'z' || event.which == 90) {
        speedOfPaddle1 =- 10;
        movePlayer1Up();
        plafond();
    }
    if (event.key == 's' || event.which == 83) {
        speedOfPaddle1 =+ 10;
        movePlayer1Down();
        plafond();
    }
    if (event.key == 'ArrowUp' || event.which == 38) {
        speedOfPaddle2 =- 10;
        movePlayer2Up();
        plafond();
    }
    if (event.key == 'ArrowDown' || event.which == 40) {
        speedOfPaddle2 =+ 10;
        movePlayer2Down();
        plafond();
    }
}, false);

document.addEventListener('keyup', function MovePaddleKeyboardUp(event) {
     if (event.key == 'z' || event.which == 90) {
        speedOfPaddle1 = 0;
        plafond();
     }
     if (event.key == 's' || event.which == 83) {
        speedOfPaddle1 = 0;
        plafond();
     }
     if (event.key == 'ArrowUp' || event.which == 38) {
         speedOfPaddle2 = 0;
         plafond();
     }
     if (event.key == 'ArrowDown' || event.which == 40) {
        speedOfPaddle2 = 0;
        plafond();
     }
}, false);
//FIN CONTROLS-------------------------------------------------------------------

window.setInterval(function show() {
    player1Y           += speedOfPaddle1;
    player2Y           += speedOfPaddle2;
    topPositionOfBall  += topSpeedOfBall;
    leftPositionOfBall += leftSpeedOfBall;

    document.getElementById("ball").style.top   = (topPositionOfBall) + "px";
    document.getElementById("ball").style.left  = (leftPositionOfBall) + "px";
    document.getElementById("Barre1").style.top = (player1Y) + "px";
    document.getElementById("Barre2").style.top = (player2Y) + "px";

        //collision balle plafond haut
    if (topPositionOfBall <= 30 || topPositionOfBall >= WidthTerrain - ballRadius) {
        topSpeedOfBall = -topSpeedOfBall
    }
        //collision balle plafond bas
    if (topPositionOfBall >= 830 || topPositionOfBall >= HeightTerrain - ballRadius) {
        topSpeedOfBall = -topSpeedOfBall
    }
        //collision Paddle & ajout de points joueur 1
    if (leftPositionOfBall < 0 && leftPositionOfBall != Barre1hauteur) {
        if (topPositionOfBall >= player1Y && topPositionOfBall <= player1Y + paddleHeight) {
            leftSpeedOfBall = -leftSpeedOfBall;
        } else {
            $("#scoreJ2").text(parseInt($('#scoreJ2').text())+1);
            but();
        }
    }
        //collision Paddle & ajout de points joueur 2
    if (leftPositionOfBall > WidthTerrain && leftPositionOfBall != Barre2hauteur) {
        if (topPositionOfBall >= player2Y && topPositionOfBall <= player2Y + paddleHeight) {
            leftSpeedOfBall = -leftSpeedOfBall;
        } else {
            $("#scoreJ1").text(parseInt($('#scoreJ1').text())+1);
            but();
        }
    }
}, 1000/60);

function generateBall() {
    var ballInsulte = $('#ball').text(tab[Math.floor(Math.random() * 10)]);
    $('#ball').text(tab[Math.floor(Math.random() * 10)]);
}

function startBall() {
    topPositionOfBall  = HeightTerrain / 2;
    leftPositionOfBall = WidthTerrain / 2;

    if (Math.random() < 0.5) {
        var side = 1
    } else {
        var side = -1
    }
    topSpeedOfBall = Math.random() * -1 - 4;                //Trajectoire
    leftSpeedOfBall = side * (Math.random() * 15 + 15);     //Vistesse

    generateBall()
};
    // DECOMPTE AVANT LANCER BALLE
function interval() {
    var compteur = setInterval(function(){
        $("#StartGame").text(parseInt($('#StartGame').text())-1);
        timer --;

        if((parseInt($('#StartGame').text())) == 0 || timer == 0) {
            $('#StartGame').css('visibility', 'hidden');
            startBall();
        }
    }, 1000);

    setTimeout(function(){
        clearInterval(compteur);
    }, 3000);
}

function but() {
    if (parseInt($('#scoreJ1').text())+1 || parseInt($('#scoreJ2').text())+1) {
        topSpeedOfBall     = 0;
        leftSpeedOfBall    = 0;
        topPositionOfBall  = HeightTerrain / 2;
        leftPositionOfBall = WidthTerrain / 2 - 22;

        $('#StartGame').css('visibility', 'visible');
        $('#StartGame').text('3');
        interval();
    }
}

/*
function getTab() {
    $('#insulte').css('visibility', 'visible');
    $(this).text($('ball').text());
    $(this).animate({fontSize: "150"}, 'fast');
    $(this).fadeOut(3000);
    $(this).css('visibility', 'hidden');
}*/
