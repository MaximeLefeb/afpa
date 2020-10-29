<?php 
    include_once 'Batiment.php';

    class Maison extends Batiment{
        private $nbPieces;

        public function __construct(String $newAdresse,Float $newSuperficie, Int $newNbPieces){
            parent::__construct($newAdresse); //! $this->adresse=$newAdresse; (parent::__construct() permet d'acceder à la function construct du parent)
            $this->setSuperdicie($newSuperficie); //! recup la fonction set de la classe parent au cas ou il s'agit d'une var private
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