<?php 
    include_once 'Batiment.php';

    class Maison extends Batiment{
        private $nbPieces;

        public function __construct(String $newAdresse,Float $newSuperficie, Int $newNbPieces){
            parent::__construct($newAdresse);
            $this->setSuperdicie($newSuperficie);
            $this->nbPieces=$newNbPieces;
        }
        //* ------------------NbPieces------------------
        public function getNbPieces() :int{
            return $this->nbPieces;
        }   
        public function setNbPieces(Int $newNbPieces) :self{
            $this->nbPieces = $newNbPieces;
            return $this;
        }

        public function __toString() :string{
            return "<br> [Superficie]: " . $this->getSuperficie() . 
                    " " . parent::__toString() . 
                    " [nbPieces]    : " . $this->nbPieces;  
        }
    }
?>