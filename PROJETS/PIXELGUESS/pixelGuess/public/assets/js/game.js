//* Pixelized effect on guess (image)
let canvas   = document.createElement("canvas");
var guess_id = $("#img-game").data();
var guess    = new Image();
var canvas_px, timer;

guess.onload = () => {
    $("#img-game").remove();
    draw(guess);
    $("#game-block").prepend(canvas_px);
    duration = 5;
    sample   = 0;
    sample_per_second = sample / duration;
    timer    = setInterval(function() {
        console.log(`Valeur de variable sample : ${sample_per_second}`);
        // if (sample == 0 && timeLeft == 0) {
        //     clearTimeout(timer);
        //     //alert();
        //     sleep(3000);
        //     play();
        //     //sample = 100;
        //     //* lauch play with previous id
        // } else {
        //     console.log('test');
        //     //* slow down the depixelized effect
        //     //? Maybe check sample lvl with if then cahnge sample -=2 by -=1
        //     sample -= 2;
        //     //draw(guess, sample, true);
        //     //timeLeft--;
        //     //$("#timer").text(timeLeft);
        // }
        //
        // return;


        $("#timer").html(duration);

        if (--duration < 0) {
            clearInterval(timer);
            $("div#response").removeClass("d-none");
            sleep(3000);
            // play(guess_id.id);
        } else {
            sample -= sample_per_second;

            draw(guess, sample, true);

            console.log(`Valeur de variable sample : ${sample}`);
        }
    }, 1000);
}

$(document).ready(() => {
    guess.src = document.getElementById("img-game").src;
});

function sleep(ms) {
    return new Promise(
        resolve => setTimeout(resolve, ms)
    );
}

function draw(img, sample_size = 400, depixelized = false, timer = 30) {
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
        url: "/play",
        data :  {
            previous_id : previous_id,
            game_type   : $("#type").val()
        },
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
        data : { request : guess_id.id },
        success: function (response) {
            console.log(response);
        },
        error: function (error) {
            console.log(error.message);
        },
        always: function (msg) {
            console.log(msg);
        }
    });
}