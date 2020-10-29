<?php 
    class Batiment {
        protected $adresse;
        private $superficie;

        public function __construct(String $newAdresse) {
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
        //* ------------------SUPERFICIE------------------
        public function getSuperficie() :Float{
            return $this->superficie;
        }   
        public function setSuperdicie($newSuperficie) :self{
            $this->superficie = $newSuperficie;
            return $this;
        }

        public function __toString() :string{
            return " [Adresse]    : " . $this->adresse . "<br>"; 
        }
    }
?>