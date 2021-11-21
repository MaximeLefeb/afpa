//* Pixelized effect on guess (image)
let canvas   = document.createElement("canvas");
var timerId  = setInterval(countdown, 1000);
var guess_id = $("img-game").id;
var guess    = new Image();
var sample   = 200
var canvas_px, timer;

guess.onload = () => {
    alert(guess_id)
    $("#img-game").remove();
    draw(guess);
    $("#game-block").prepend(canvas_px);
    timer = setInterval(countdown, 1000/10);
}

$(document).ready(() => {
    guess.src = document.getElementById("img-game").src;
});

function sleep(ms) {
    return new Promise(
        resolve => setTimeout(resolve, ms)
    );
}

function draw(img, sample_size = 100, depixelized = false) {
    canvas.width  = img.width;
    canvas.height = img.height;

    ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);

    let pixelArr = ctx.getImageData(0, 0, img.width, img.height).data;

    for (let i = 0; i < img.height; i += sample_size) {
        for (let y = 0; y < img.width; y += sample_size) {
            let p = ( y + (i * img.width) ) * 4;

            ctx.fillStyle = "RGBA(" + pixelArr[p] + ", " + pixelArr[p + 1] + ", " + pixelArr[p + 2] + ", " + pixelArr[p + 3] + ")";
            ctx.fillRect(y, i, sample_size, sample_size);
        }
    }

    if (depixelized != false) {
        canvas_px     = $("#guess-image")[0];
        canvas_px.src = canvas.toDataURL("image/jpeg");
        canvas_px.id  = "guess-image";
    } else {
        canvas_px     = new Image();
        canvas_px.src = canvas.toDataURL("image/jpeg");
        canvas_px.id  = "guess-image";
    }
}

function clearImg() {
    $("#guess-image").remove();
}

//* Timer (ms)
function countdown() {
    let timeLeft = 20;

    if (sample == 0 && timeLeft == 0) {
        clearTimeout(timer);
        alert();
        sleep(3000);
        play();
        //sample = 100;
        //* lauch play with previous id
    } else {
        if (sample < 100) {
            sample-= 1;
            draw(guess, sample, true);
        } else {
            sample-= 2;
            draw(guess, sample, true);
            //timeLeft--;
            //$("#timer").text(timeLeft);
        }
    }
}

//* Launch guess when enter is pressed
$("#response").on("keydown", (e) => {
    if (e.which === 13) {
        guess_keyword(
            $(e.target).val()
        )
    }
});

//* Ajax play another game when timer is over
function play(previous_id) {
    $.ajax({
        type: "POST",
        url: "/play/" + previous_id,
        success: function (response) {
            draw(response);
        },
        error: function (error) {
            alert(error.message);
        }
    });
}

//* Check if keyword is correct
function guess_keyword(keyword) {
    $.ajax({
        type : "GET",
        url  : "/guess/" + keyword,
        data : { request : $('#img-game').data('id') },
        success: function (response) {
            alert(response);
            console.log(response);
        },
        error: function (error) {
            alert(error.message);
        }
    });
}