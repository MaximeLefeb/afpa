<?php 
$string   = "[text_present_near_hear] Bonjour [text_present_near_hear]";
$brackets = "[text_present_near_hear][test] Bonjour [test][text_present_near_hear]";
$test = "bonjour";

function trim_bracket(string $to_trim):string {
    if (strpos($to_trim, ']') != false) {
        $pre_trimed = explode(']', $to_trim)[1];

        if (strpos($pre_trimed, '[') != false) {
            return explode('[', $pre_trimed)[0];
        } else {
            return $pre_trimed;
        }
    } else {
        return $to_trim;
    }
}

// echo(trim_bracket($string));

function multi_trim_bracket(string $to_trim):string {
    while (strpos($to_trim, '[')) {
        foreach (str_split($to_trim) as $caracter) {
            # code...
        }
    }
}

foreach (str_split($brackets) as $caracter) {
    if ($caracter === "[") {
        echo(strpos($caracter, '['));

        
    }
}

//echo(multi_trim_bracket($string));