<?php 
    //*AFFICHER BOUTONS
    function showButton(String $url1, String $url2, String $nameButton1, String $nameButton2) :Void {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
?>