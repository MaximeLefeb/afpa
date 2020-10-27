<?php 
    include_once 'exercicesBatiment.php';

    class Maison extends Batiment{
        private $nbPieces;

        public function __construct(Int $newNbPieces){
            $this->nbPieces=$newNbPieces;
        }
        //* ------------------NbPieces------------------
        public function getNbPieces() :int{
            return $this->nbPieces;
        }   
        public function setNbPieces($newNbPieces) :self{
            $this->nbPieces = $newNbPieces;
            return $this;
        }

        public function __toString() :string{
            return " [Superficie]: " . $this->superficie . 
                    " [Adresse]    : " . $this->adresse . 
                    " [nbPieces]    : " . $this->nbPieces;  
        }
    }
    
    $house->setNbPieces(3);
    $house->setAdresse("19 Avenue des peupliers");
    $house->setSuperdicie(150.5);
    echo $house;
?>