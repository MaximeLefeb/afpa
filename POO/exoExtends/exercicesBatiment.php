<?php 
    class Batiment {
        private $adresse;
        private $superficie;

        public function __construct(String $newAdresse,Float $newSuperficie){
            $this->adresse=$newAdresse;
        }
        //* ------------------ADRESSE------------------
        public function getAdresse() :String{
            return $this->adresse;
        }   
        public function setAdresse($newAdresse) :self{
            $this->adresse = $newAdresse;
            return $this;
        }

        public function __toString() :string{
            return " [Adresse]    : " . $this->adresse . 
                    " [Superficie]: " . $this->superficie; 
        }
    }
?>