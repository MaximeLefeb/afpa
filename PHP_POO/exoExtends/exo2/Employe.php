<?php 

    include_once 'Personne.php';

    class Employe extends Personne {
        protected $salaire;

        public function __construct(String $nomEmploye, String $prenomEmploye, Float $newSalaire) {
            $this->setNom($nomEmploye);
            $this->setPrenom($prenomEmploye);
            $this->salaire = $newSalaire;
        }
        
        //* ------------------SALAIRE------------------
        public function getSalaire() :Float{
            return $this->salaire;
        }
        public function setSalaire(Float $newSalaire) :Self{
           $this->salaire = $newSalaire;
           return $this;
        }

        public function __toString() :String {
            return parent::__toString() . " Mon salaire est de : " . $this->salaire . "€";
        }
    }
?> 