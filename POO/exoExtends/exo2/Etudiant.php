<?php

    include_once 'Personne.php';

    class Etudiant extends Personne {
        private $cne;

        public function __construct(String $newNom, String $newPrenom, String $newCne) {
            $this->nom    = $newNom;
            $this->prenom = $newPrenom;
            $this->cne    = $newCne;
        }

        //* ------------------CNE------------------
        public function getCne() :String {
            return $this->cne;
        }
        public function setCne(String $newCne) :Self {
            $this->$cne = $newCne;
        }

        public function __toString() :String{
            return parent::__toString() . ", mon CNE est : " . $this->cne;
        }
    }

?>