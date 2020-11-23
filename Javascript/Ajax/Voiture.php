<?php 
    class Voiture {
        public $marque;
        public $modele;

        public function getMarque() :String {
            return $this->marque;
        }
        public function setMarque(String $newMarque) :Self {
            $this->marque = $newMarque;
            return $this;
        }

        public function setModele() :String {
            return $this->modele;
        }
        public function getModele(String $newModele) :Self {
            $this->modele = $newModele;
            return $this;
        }
    }
?> 