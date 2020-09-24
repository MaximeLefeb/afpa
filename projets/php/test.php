<?php 

//* Exercices 2.3

$prixHT      = readline("saisissez le prix hors taxe : ");
$nbArticles  = readline("saisissez le nombre d'articles : ");
$tva         = readline("Saisissez le taux tva : ");

$prixTotalHt = $prixHT * $nbArticles;
$calculeTVA  = $prixTotalHt / 100 * $tva;
$prixTTC = $prixTotalHt + $calculeTVA;

echo($prixTTC);
echo ("\n");

//* Exercices 2.4

$part1 = " Belle marquise ";
$part2 = " Vos beaux yeux me font ";
$part3 = " Mourir d'amour ";

echo ($part1 . $part2 . $part3);
echo ("\n");
echo ($part2 . $part1 . $part3);
echo ("\n");
echo ($part1 . $part3 . $part2);
echo ("\n");
echo ($part3 . $part2 . $part1);
echo ("\n");


//* Exercices 3.1

$nbPosNeg = readline("Saisissez un nombre je vais vous dire si il est possitif ou négatif : ");

if ($nbPosNeg > 0) {
	echo("Nombre saisie est possitif");
} else {
	echo("Nombre saisie est négatif");
}

//* Exercices 3.2

$nb  = readline("Saisissez un nombre : ");
$nb1 = readline("saisissez un second nombre : ");

if ($nb + $nb1 < 0) {
	echo("Produit négatif");
} else {
	echo("Produit possitif");
}

//* Exercices 3.3

$chaine1 = readline("Saisissez votre nom : ");
$chaine2 = readline("Saisissez le nom de votre ami 1 : ");
$chaine3 = readline("Saisissez le nom de votre ami 2 : ");

if ($chaine1[0] > $chaine2[0] && $chaine1[0] > $chaine3[0]) {
	echo("pas en ordre alphabétique");
} else {
	echo("en odre alphabétique");
}

//* Exercices 3.4

$nb  = readline("Saisissez un nombre : ");

if ($nb > 1) {
	echo("Possitif");
} elseif ($nb == 0) {
	echo("Null");
} else {
	echo("Negatif");
}

//* Exercices 3.5

$nb  = readline("Saisissez un nombre : ");
$nb1 = readline("saisissez un second nombre : ");

if ($nb + $nb1 > 1) {
	echo("Possitif");
} elseif ($nb + $nb1 == 0) {
	echo("Null");
} else {
	echo("Negatif");
}

//* Exercices 3.6

$age = readline("Saisissez votre âge : ");

if ($age > 12) {
	echo ("Cadet");
} elseif ($age == 10 || $age == 11) {
	echo ("Minime");
} elseif ($age == 8 || $age == 9) {
	echo ("Pupille");
} elseif ($age == 6 || $age == 7) {
	echo ("Poussin");
} else {
	echo ("Degage minus :)");
}

 //* Exercices 4.1

if ($tutu > $toto + 4 || $tata == "OK") {
	$tutu++;
} else {
	$tutu--;
}

//* Exercices 4.2

$heure = readline("saisissez les heures : ");
$minute = readline("Saisissez les minutes : ");

$minute++;

if ($heure == "24" && $minute == "60") {
	$heure = "01";
	$minute = "00";
}

if ($minute == "60") {
	$heure++;
	$minute = "00";
} 

echo("Dans une minute il sera " . $heure . "h" . $minute);

//* Exercices 4.3

$heure = readline("saisissez les heures : ");
$minute = readline("Saisissez les minutes : ");
$seconde = readline("Saisissez les secondes : ");

$seconde++;

if ($heure == "24" && $minute == "59" && $seconde == "60") {
	$heure = "01";
	$minute = "00";
	$seconde = "00";
}

if ($minute == "59" && $seconde == "60") {
	$heure++;
	$minute = "00";
	$seconde = "00";
} 

echo("Dans une seconde il sera " . $heure . " h " . $minute . " s " . $seconde);

//* Exercices 4.4

$nbPhotocopie = readline("Combien de photocopie voulez-vous effectuez : ");
$prix = 0;

if ($nbPhotocopie <= 10) {
	$prix = 0.10 * $nbPhotocopie;
} elseif ($nbPhotocopie <= 30) {
	$prix = 0.10 * 10;
	$nbPhotocopie =- 10;
	$prix = 0.09 * $nbPhotocopie;
} else {
	$prix = 0.10 * 10;
	$nbPhotocopie =- 10;
	$prix = 0.09 * $nbPhotocopie;
	$nbPhotocopie =- 20;
	$prix = 0.08 * $nbPhotocopie;
}

echo($prix);

//* Exercices 4.5

$ageZorglub = readline("Bonjour Zorglubien, quel âge avez-vous ? ");
$sexeZorglub = readline("F / H ? ");

if ($ageZorglub > 20 && $sexeZorglub == "H") {
	echo("Vous êtes imposable citoyen Zorglubien");
} elseif($ageZorglub >=18 && $ageZorglub <=35 && $sexeZorglub == "F") {
	echo("Vous êtes imposable citoyenne Zorglubienne");
} else {
	echo("Vous n'êtes pas imposable citoyen");
}

//* Exercices 4.6

$candid1 = readline("Score du candidat numéro 1 : ");
$candid2 = readline("Score du candidat numéro 2 : ");
$candid3 = readline("Score du candidat numéro 3 : ");
$candid4 = readline("Score du candidat numéro 4 : ");

if ($candid1 > 50) {
	echo("Vous êtes élu au premier tour avec " . $candid1 . "% des voix ! Félécitations !");
} else {
	if ($candid1 < 12.5) {
		echo("Vous n'avez pas reçu assez de voix pour participez au second tour.");
	} else {
		if ($candid1 > $candid2 && $candid1 > $candid3 && $candid1 > $candid4) {
			echo("Vous n'avez pas été élu au premier tour, cependant vous participez au second en étant en ballottage favorable");
		} else {
			echo("Vous n'avez pas été élu au premier tour, cependant vous participez au second en ballottage défavorable");
		}
	}
}

//* Exercices 4.7

	//

//* Exercices 4.8

$annee = readline("Saisissez une année");
$mois  = readline("Saisissez un mois");
$jour  = readline("Saisissez un jour");
$Bisextile = false;

if ($annee % 4 == 400 || ($annee % 4 == 0 && $annee % 100 != 0)) {
	$Bisextile = true;
}

if (($mois < 12 || $mois > 0) && ($jour > 31 || $jour < 0) && $mois == 2 && ($Bisextile && ($jour > 29 && $jour < 0) || (!$Bisextile && $jour > 28 && $jour < 0)) || (($mois == 4 || $mois == 6 || $mois == 9 || $mois == 11) && $jour > 30)) {
	echo("Date invalide");
} else {
		echo("Date valide");
}

//* Exercices 5.1

$n = readline("Entrez un nombre entre 1 et 3 : ");
while ($n < 1 || $n > 3) {
	if ($n < 1 || $n > 3) {
		$n=readline("Saisie erronée. Recommencez : ");
	}
}

//* Exercices 5.2

$n=readline("Entrez un nombre entre 10 et 20 : ");

while ($n < 10 || $n > 20) {
	if ($n < 10) {
		echo "plus grand !";
		$n=readline("Entrez un nombre entre 10 et 20 : ");
	}elseif ($n > 20) {
		echo "plus petit !";
		$n=readline("Entrez un nombre entre 10 et 20 : ");
	}else{
		echo"$n est bien entre 10 et 20";
	}
}

//* Exercices 5.3

$n = readline("Entrez un nombre : ");
echo "Les nombres suivant sont : ";
for ($i=$n + 1; $i < $n+11 ; $i++) { 
	echo "$i ";
}

//* Exercices 5.4

$n = readline("Entrez un nombre : ");

echo "La table de mutiplication de $n est : \n";
for ($i=1; $i <= 10; $i++) { 
	echo "$n x $i = " . $n*$i . "\n";
}

//* Exercices 5.5 

$n = readline("Entrz un nombre : ");
$som = 0;

for ($i=0; $i < $n; $i++) { 
	$som = $som + $i;
}

echo("la somme est : $som");

//* Exercices 5.6

$n = readline("Entrz un nombre : ");
$f = 1;

for ($i=2; $i < $n; $i++) { 
	$f = $f * $i;
}
echo "La factoriell est : $f";

//*  Exercices 5.7

$pg = 0;
for ($i=1; $i < 20 ; $i++) { 
	$n=readline("Entrez un nombre : ");
	if ($i = 0 || $n > $pg) {
		$pg = $n;
	}
}
echo "Le nombre le plus grand était : $pg";

//* Exercices 5.8

$n = 1;
$i = 0;
$pg = 0;
while ($n <> 0) {
	$n = readline("Entrez un nombre : ");
	$i++;
	if ($i = 1 || $n > $pg) {
		$pg = $n;
		$ipg = $i;
	}
}

echo "Le nombre le plus grand était : $pg";
echo "il a été saisi en position numéro : $ipg";

//* Exercices 5.9

$e = 1;
$somdue = 0;
while ($e <> 0) {
	$e = readline("Entrez le montant : ");
	$somdue = $somdue + $e;
}

echo "Vous devez $somdue euros";
$m = readline("Montant versé : ");
$reste = $m - $e;
$nb10e = 0;

while ($reste >= 10) {
	$nb10e++;
	$reste = $reste - 10;
}

if ($reste >=5) {
	$nb5e = 1;
	$reste = $reste -5;
}
echo "Rendu de la monnaie : ";
echo "Billets de 10 euros $nb10e";
echo "Billets de 5 euros $nb5e";
echo "Pièces de 1 euros $reste";

//* Exercices 5.10

$n = readline("Entrez le nombre de chevaux partants : ");
$p = readline("Entrez le nombre de chevaux joués : ");

$a = 1;
$b = 1;

for($i=1; $i<$p; $i++) {
	$a =$a * ($i + $n - $p);
	$b = $b * $i;
}

echo "Dans l'ordre, une chance sur $a \n";
echo "Dans le désordre, une cahnce sur " . $a/$b;

//* Exercices 6.1 

$tab = [];

for ($i=0; $i <= 7 ; $i++) { 
	$tab[$i] = readline("entrez la valeur de la case $i : ");
}

foreach ($tab as $key => $value) {
	echo "[$key] => $value ";
}

//* Exercices 6.2

$tableau = ["a", "e", "i", "o", "u", "y"];
echo "$tableau[1]";

//* Exercices 6.3

$tab = [];

for ($i=0; $i <= 9 ; $i++) { 
	$tab[$i] = readline("entrez la valeur de la case $i : ");
	echo "la note $i est de $tab[$i] \n";
}

//* Exercices 6.4

$nb = [];

for ($i=0; $i <= 5 ; $i++) { 
	$nb[$i] = $i * $i;
	echo "$nb[$i]";
}

//* Exercices 6.5 / 6.6

	//

//* Exercices 6.7

$tab = [];
$somme = 0;

for ($i=0; $i <= 9 ; $i++) { 
	$tab[$i] = readline("entrez la valeur de la case $i : ");
	$somme = $somme + $tab[$i];
}

echo "La moyenne est de : " . $somme / 9;

//* Exercices 6.8

$t = [];
$nb = readline("Entrez le nombre de valeurs : ");

$nbPos = 0;
$nbNeg = 0;

for ($i=0; $i < $nb; $i++) { 
	$t[$i] = readline("Entrez le nombre numéro $i : ");

	if ($t[$i] > 0) {
		$nbPos++;
	} else {
		$nbNeg++;
	}
}

echo "Nombre de valeurs positives : $nbPos \n";
echo "Nombre de valeurs négatives : $nbNeg";

//* Exercices 6.9

$tab = [1, 12, 18, 11, 7, 8, 5, 10, 14, 14];
$tabLength = sizeof($tab);
$somme = 0;

for ($i=0; $i < $tabLength; $i++) { 
	$somme = $somme + $tab[$i]; 
}

echo "Somme des éléments du tableau : $somme";

//* Exercices 6.10

$tab1 = [12, 15 ,18];
$tab2 = [11, 20, 8];
$tab3 = [14, 12, 17];

$tabLength = sizeof($tab1);

for ($i=0; $i < $tabLength; $i++) { 
	$tab3[$i] = $tab2[$i] + $tab3[$i];
}

//* Exercices 6.11

$tab1 = [15,18,19,25,36,15];
$tab2 = [14,17,11,10,35,41];
$n1   = sizeof($tab1);
$n2   = sizeof($tab2);
$s    = 0;

for ($j=0; $j < $n1; $j++) { 
	for ($i=0; $i < $n2; $i++) { 
		$s = $s + $tab1[$i] * $tab2[$j]; 	
	}
}

echo "Le schtroumpf est : $s";

//* Exercices 6.12

$tab = [];
$nb  = readline("Entrez le nombre de valeurs : ");

for ($i=0; $i < $nb; $i++) { 
	$tab[$i] = readline("Entrez le nombre numéro $i : ");
}
echo "Noveau tableau : ";
for ($i=0; $i < $nb; $i++) { 
	$tab[$i] = $tab[$i] + 1;
	echo "$tab[$i]";
}

//* Exercices 6.13

$tab = [];
$nb  = readline("Entrez le nombre de valeurs : ");

for ($i=0; $i < $nb; $i++) { 
	$tab[$i] = readline("Entrez le nombre numéro $i : ");
}
$posMaxi = 0;
for ($i=0; $i < $nb; $i++) { 
	if ($tab[$i] > $tab[$posMaxi]) {
		$posMaxi = $i;
	}
}

echo "Element le plus grand : $tab[$posMaxi] \n";
echo "Position de cet élement : $posMaxi";

//* Exercices 6.14

$tab = [];
$nb  = readline("Entrez le nombre de notes à saisir : ");
$som = 0;
$nbSup   = 0;

for ($i=0; $i < $nb; $i++) { 
	$tab[$i] = readline("Entrez le nombre numéro $i : ");
}
for ($i=0; $i < $nb; $i++) { 
	$som = $som + $tab[$i];
}

$moyenne = $som / $nb;

for ($i=0; $i < $nb; $i++) { 
	if ($tab[$i] > $moyenne) {
		$nbSup++;
	}
}

echo "$nbSup élèves dépassent la moyenne de classe";

//* Exercices 7.1
//! A CORRIGER

$tab = [];
$nb  = readline("Entrez le nombre de notes à saisir : ");
$i   = 0;

for ($i=0; $i < $nb; $i++) { 
	$tab[$i] = readline("Entrez le nombre numéro $i : ");
}
while ($tab[$i] = $tab[$i] + 1 && $i < $nb) {
	$i++;
}
if ($tab[$i] = $tab[$i] + 1) {
	echo "Les nombres sont consécutifs";
} else {
	echo "Les nombres ne sont pas consécutifs";
}

//* Exercices 7.2
$tab      = [1, 58 ,115 ,14 ,144, 96];
$n        = sizeof($tab);

//TRI PAR INSERTION/ordre décroissant
for ($i=0; $i < $n - 1; $i++) { 
	$posMaxi = $i;
	for ($j=$i+1; $j < $n; $j++) { 
		if ($tab[$j] > $tab[$posMaxi]) {
			$posMaxi = $j;
		}
	}

	$temp          = $tab[$posMaxi];
	$tab[$posMaxi] = $tab[$i];
	$tab[$i]       = $temp;
}

//TRI PAR BULLE/ordre croissant
$yaPermut = true;

while ($yaPermut) {
	$yaPermut = false;

	for ($i=0; $i < $n - 1; $i++) { 
		if ($tab[$i] > $tab[$i + 1]) {
			$temp = $tab[$i];
			$tab[$i] = $tab[$i +1];
			$tab[$i +1] = $temp;
			$yaPermut = true;
		}
	}
}

foreach ($tab as $key => $value) {
	echo "[$value]";
}

//* Exercices 7.3

$tab = [1,18,59];
$n = sizeof($tab);

for($i=0; $i < sizeof($tab); $i++) { 
	$temp = $tab[$i];
	$tab[$i] = $tab[$n-$i];
	$tab[$n-$i] = $temp;
}

//* Exercices 7.4

$tab = [1,18,59];
$n = sizeof($tab);
$s = readline("Rang de la valeur à supprimer ? ");

for ($i=$s; $i < $n -1; $i++) { 
	$tab[$i] = $tab[$i + 1];
}

//* Exercices 7.5

$dico = [];
$nb   = readline("Entrez le nombre de mot que vous allez entrer : ");

for($i=1; $i<=$nb; $i++) {
    $dico[$i]=readline("Entrez le mot numéro $i : \n");
}

$mot = readline("Entrer le mot à vérifier : ");
$v   = array_search($mot,$dico);

if ($v != false) {
    echo "le mot est présent ";
} else {
    echo "le mot n'est pas présent ";
}

$dicto [0] = "animaux";
$dicto [1] = "bonjour";
$dicto [2] = "chat";
$dicto [3] = "dindon";
$dicto [4] = "faon";
$dicto [5] = "zebre";
$indiceD = 0;
$indiceF = $nb;
$banco   = false;
$mot     = readline("Saisissez un mot à rechercher : "); 

do {
	$indiceM =($indiceD+$indiceF)/2;
	$m       = intval($indiceM);

    if ($mot>$dicto[$m]) {
        $indiceD = $m+1;
    }
    elseif ($mot<$dicto[$m]) {
        $indiceF = $m-1;
    }
    else {
        $banco=true;
    	break;
   	}
} while ( $indiceD<=$indiceF );

if ($banco) {
    echo ("Mot trouvé ! ");
}
else {
    echo ("Mot inconnu...");
}

//* Exercices 8.1

$truc = array_fill(1,6, array_fill(0,14,0)); // remplit 6 tableaux, numérotés de 1 à 6 en clefs, contenant chacun un tableau de 14 valeurs, numérotés de 0 à 13, valant chacune 0

print_r($truc);

//* Exercices 8.2

  	//

//* Exercices 8.3

	//

//* Exerices 8.4

	//

//* Exercices 8.5
	
	//

//* Exercices 8.6 

$mainArray = array(
				array(1,18,58),
				array(12,85,96),
				array(8,23,41),
				array(74,11,16),
				array(99,14,36),
				array(33,65,61),
				array(4,8,67),
				array(69,85,74),
				array(49,91,61),
				array(55,51,5),
				array(10,32,63),
				array(89,4,22));
$n    = sizeof($mainArray);
$iMax = 0;
$jMax = 0;

for ($i=0; $i < $n; $i++) { 
	for ($j=0; $j < 3; $j++) { 
		if ($mainArray[$i] && $mainArray[$j] > $mainArray[$iMax] && $mainArray[$jMax]) {
			$iMax = $i;
			$jMax = $j;
		}
	}
}

echo "Le plus grand élément est : $mainArray[$iMax], $mainArray[$jMax].\n";
echo "Il se trouve aux indices : $iMax, $jMax";

//* Exercices 8.7

	//TODO

//* Exercices 9.1

	//

//* Exercices 9.2 peut se faire avec str_word_count()

$mot = readline("Entrez un mot : ");
$nb = strlen($mot);
echo "$nb lettres dans votre saisie.";

//* Exercices 9.3

$mot = readline("Entrez un mot : ");
$nb = strlen($mot);
$espace = 0;

for ($i=0; $i < $nb; $i++) { 
	if ($mot[$i] == " ") {
		$espace++;
	}
}
$espace= $espace +1;

echo "Il y a" .$espace. "mots dans cette phrase";

//* Exercices 9.4

$phrase = readline("Entrez une phrase : ");
$length = strlen($phrase);
$nb = 0;
for ($i=0; $i < $length; $i++) { 
	if ($phrase[$i] == "a" || $phrase[$i] == "e" || $phrase[$i] == "i" ||$phrase[$i] == "o" || $phrase[$i] == "u" || $phrase[$i] == "y") {
		$nb++;
	}
}

echo "Cette phrase compte $nb voyelles";

//* Exercices 9.5

$str = readline("Entrez une phrase : ");
$pos = readline("Entrez le rang du caractère à supprimmer : ");
$stringLength = strlen($str);
$str1 = substr($str,0,$pos);
$str2 = substr($str,$pos +1 ,$stringLength);
echo "$str1$str2";


//* Exercices 9.6

function cryptographie($str) {
	$alpha        = array_combine(range(0,25), range('a','z'));
	$alphaLength  = sizeof($alpha);
	$stringLength = strlen($str);
	$str          = strtolower($str);
	
	for ($i=0; $i < $stringLength; $i++) { 
		for ($j=0; $j <= $alphaLength - 1 ; $j++) {
			if($str[$i] == $alpha[25]) {
				$str[$i] = $alpha[0];
				echo $str[$i];
			} elseif ($str[$i] == $alpha[$j]) {
				$t = strval($alpha[$j + 1]);
				echo $t;
			}
		}
	}
}
$mot = readline("Entrez votre phrase à crypter : ");
cryptographie($mot);

function trouver($tableau,$lettre){
    for($i=0; $i<=count($tableau); $i++){
        if ($tableau[$i]==$lettre){
            return $i;
        }
    }
    return -1;
}
function crypter($mot){
    $tableau = array_combine(range(0,25), range('A','Z'));
    $pos     = 0;
    for($i=0; $i <= strlen($mot - 1); $i++) {
		$pos=trouver($tableau,$mot[$i]);
		
       if($mot[$i]=="Z") {
			$mot[$i]="A";
		} else {
       		$mot[$i]=$tableau[$pos+1];
       }
	}
    return $mot;
}
$mot = readline("Entre un mot ");
echo crypter($mot);

//* Exercices 9.7

function trouve($alpha, $lettre) {
    for($i = 0; $i <= sizeof($alpha); $i++) {
        if ($alpha[$i] == $lettre){
            return $i;
        }
    }
    return -1;
}

function crypte($str, $decal) {
	$alpha   = array_combine(range(0,25), range('a','z'));
	$str     = strtolower($str);
	$pos     = 0;
	
    for($i = 0; $i <= strlen($str) - 1; $i++) {
		$pos = trouve($alpha, $str[$i]);

		if($pos > sizeof($alpha) - $decal) {
			$pos     = $alpha[0];
			$realPos = $decal % sizeof($alpha);
			$str[$i] = $alpha[$realPos];
		} else {
			$str[$i] = $alpha[$pos + $decal];
		}
	}
    return $str;
}

$decal = readline("Entrez le décalage souhaité : ");
$str   = readline("Entrez votre phrase à crypter : ");
echo crypte($str,$decal);

//* Le juste prix

$prix = rand(1,100000);
echo "Je génère un nombre aléatoire entre 1 et 100.000, tu as 29 essaies pour trouver le nombre exact. \n";

for ($i=0;$i<=29;$i++){

    $tentative = readline("Entre une tentative : ");

    if ($i == 28) {
    	echo"Il ne vous reste plus qu'un seul essaie ! \n";
    } elseif($i == 29) {
    	echo "Perdu !";
    	break;
    }

    if ($prix == $tentative) { 
        echo "Bravo !";
        break;
    }
    elseif ($prix < $tentative) {
        echo "Tente ta chance avec un nombre plus petit \n";
    }
    else {
        echo "Tente ta chance avec un nombre plus grand \n"; 
    }
} 

?>