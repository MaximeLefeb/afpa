<?php 
    include_once 'exercicesBatiment.php';

    class Maison extends Batiment{
        private $nbPieces;

        public function __construct(Int $newNbPieces, String $newAdresse,Float $newSuperficie){
            $this->nbPieces=$newNbPieces;
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
        //* ------------------NbPieces------------------
        public function getNbPieces() :int{
            return $this->nbPieces;
        }   
        public function setNbPieces($newNbPieces) :self{
            $this->nbPieces = $newNbPieces;
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
            return " [Superficie]: " . $this->superficie . 
                    " [Adresse]    : " . $this->adresse . 
                    " [nbPieces]    : " . $this->nbPieces;  
        }
    }

    $house = new maison(3, "19 Avenue des peupliers",150.5);
    echo $house;

?>