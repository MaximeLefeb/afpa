<?php 
    class Voiture {
        public $marque;
        public $modele;

        public function __construct(string $marque, string $modele ) {
            $this->marque = $marque;
            $this->modele = $modele;
        }
    }
?> 