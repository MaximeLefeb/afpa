<?php
    class Voiture {
        public $marque;
        public $modele;
        public $carburant;

        public function __construct(string $marque, string $modele , string $carburant="ESSENCE") {
            $this->marque = $marque;
            $this->modele = $modele;
            $this->carburant = $carburant;
        }
    }
?>