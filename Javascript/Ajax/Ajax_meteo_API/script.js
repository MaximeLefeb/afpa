//* api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}

$('#villeSelector').on('change', function(e) {
    const Selected_Town = $("#villeSelector :selected").val();
    let url = Selected_Town ? 'http://api.openweathermap.org/data/2.5/weather?q=' + Selected_Town + '&lang=fr&units=metric&appid=425749b4f146f785d0995861e7d439f0' : "Main.php";
    getWeather(url);
});

function getWeather(url) {
    const d = $.Deferred();
    let weather = [];
    $.getJSON(url, function(data) {
        res = data;
        $("#weather_result").empty();
        
        $.each(data.weather, function(cle, valeur) {
            weather.push(valeur);
        });

        weather.push(data.main);

        //* NOM DE LA VILLE
        $("<div>").html(data.name).appendTo($("#weather_result")); 

        //* METEO
        $("<div>").html(weather[0].description).appendTo($("#weather_result"));

        //* TEMPERATURE
        $("<div>").html(Math.trunc(weather[1].temp) + ' °C').appendTo($("#weather_result"));

        //* Background
        switch (weather[0].id) {
            case 801: //* Light clouds
                changeBackgroundImage('Light clouds');
                break;

            case 802: case 803: //* Medium clouds
                changeBackgroundImage('Medium clouds');
                break;

            case 804: //* Heavy clouds
                changeBackgroundImage('Heavy clouds');
                break;
        
            case 800: //* Clear sky
                changeBackgroundImage('Clear sky');
                break;

            case 600: case 601: case 602: case 611: case 612: case 613: case 615: case 616: case 620: case 621: case 622: //* Snow
                changeBackgroundImage('Snow');
                break;

            case 500: case 501: case 520: case 521: //* Light rain
                changeBackgroundImage('Light rain');
                break;

            case 502: case 503: case 504: case 511: case 522: case 531: //* Heavy rain
                changeBackgroundImage('Heavy rain');
                break;

            case 200: case 201: case 202: case 211: case 221: case 230: case 231: case 232: //* Thunderstorm
                changeBackgroundImage('Thunderstorm');
                break;

            case 701: case 711: case 741: //* Fog 
                changeBackgroundImage('Fog');
                break;
        }

        d.resolve(res);

    });

    return d.promise();

}

function changeBackgroundImage(weather) {
    var picto = '#';
    switch (weather) {
        case 'Light clouds':
            weather = 'url(img/background/few_clouds.jpeg)';
            picto = 'http://openweathermap.org/img/wn/02d@2x.png';
            break;

        case 'Medium clouds':
            weather = 'url(img/background/scattered_clouds.jpeg)';
            picto = 'http://openweathermap.org/img/wn/03d@2x.png';
            break;

        case 'Heavy clouds':
            weather = 'url(img/background/broken_clouds.jpg)';
            picto = 'http://openweathermap.org/img/wn/04d@2x.png';
            break;

        case 'Clear sky':
            weather = 'url(img/background/clear_sky.jpg)';
            picto = 'http://openweathermap.org/img/wn/01d@2x.png';
            break;

        case 'Snow':
            weather = 'url(img/background/snow.jpg)';
            picto = 'http://openweathermap.org/img/wn/13d@2x.png';
            break;

        case 'Light rain':
            weather = 'url(img/background/shower_rain.jpeg)';
            picto = 'http://openweathermap.org/img/wn/10d@2x.png';
            break;

        case 'Heavy rain':
            weather = 'url(img/background/rain.jpg)';
            picto = 'http://openweathermap.org/img/wn/09d@2x.png';
            break;

        case 'Thunderstorm':
            weather = 'url(img/background/thunderstorm.jpg)';
            picto = 'http://openweathermap.org/img/wn/11d@2x.png';
            break;
            
        case 'Fog':
            weather = 'url(img/background/mist.jpg)';
            picto = 'http://openweathermap.org/img/wn/50d@2x.png';
            break;
    }

    $('body').css({'background': weather, "background-size": "cover", 'background-repeat' : 'no-repeat'});
    $('#weatherPicto').attr({'src': picto});
    $('#weatherPicto').css({'display' : 'inline'});
}
