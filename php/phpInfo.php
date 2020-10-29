<?php
$a =8;
$b =9;

class Testeur {
    private $nom;

    public function __construct(String $nom){
        $this->nom = $nom;
    }

    public function getNom() :String {
        return $this->nom;
    }
    public function setNom($newNom) :String {
        $this->nom = $newNom;
        return $this;
    }
}

$Testi = new Testeur("Maxime");

if ($Testi->getNom() == "Maxime") {
    echo "Bonjour " . $Testi->getNom() . ". :)";
} else {
    echo "T'es qui toi ?";
}