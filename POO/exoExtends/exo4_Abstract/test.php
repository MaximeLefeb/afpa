<?php

include_once "Developpeur.php";
include_once "Manager.php";

$dev1 = new Developpeur(1, "A", "B", "a.@g.c", "01011111111", 120.3, "Backend");
$dev2 = new Developpeur(2, "AA", "BB", "aa.@g.c", "01011122211", 1220.3, "Frontend");
$dev3 = new Developpeur(3, "AAA", "BBB", "aaa.@g.c", "01011133311", 1320.3, "Fullstack");
echo "Nombre de personnes créées : " . Developpeur::$counter . "\n";
$man1 = new Manager(4, "B", "C", "c.@g.c", "01011111111", 1200.3, "Bichimie");
$man2 = new Manager(5, "BB", "CC", "c.@g.c", "01011122211", 1880.3, "Energie");
$man3 = new Manager(6, "BBB", "CCC", "ccc.@g.c", "01011133311", 1320.3, "Medecine");
echo "Nombre de personnes créées : " . Personne::$counter . "\n";

echo $dev1->afficher() . "\n";

$man1->afficher();
