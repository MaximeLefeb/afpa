<?php 
    class Batiment {
        private $adresse;
        private $superficie;

        public function __construct(String $newAdresse,Float $newSuperficie){
            $this->adresse=$newAdresse;
            $this->superficie=$newSuperficie;
        }
        //* ------------------ADRESSE------------------
        public function getAdresse() :String{
            return $this->adresse;
        }   
        public function setAdresse($newAdresse) :self{
            $this->adresse = $newAdresse;
            return $this;
        }
        //* ------------------SUPERFICIE------------------
        public function getSuperficie() :Float{
            return $this->superficie;
        }   
        public function setSuperdicie($newSuperficie) :self{
            $this->superficie = $newSuperficie;
            return $this;
        }

        public function __toString() :string{
            return " [Adresse]    : " . $this->adresse . 
                    " [Superficie]: " . $this->superficie; 
        }
    }
?>