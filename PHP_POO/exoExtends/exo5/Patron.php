<?php

    include_once 'Employe.php';

    class Patron extends Employe {
        private static $chiffreAffaire = 100000;
        private $pourcentage;

        
        public function getPourcentage() :Int {
            return $this->pourcentage;
        }
        public function setPourcentage(Int $pourcentage) :Self {
            $this->pourcentage = $pourcentage;
            return $this;
        }

        public function getSalaire() :?Float { 
            return self::$chiffreAffaire = $this->pourcentage / 100;
        }
    }
?>