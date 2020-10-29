<?php 
    include_once 'Employe.php';
    
    class Professeur extends Employe {
        private $specialite;

        public function __construct(String $nomProf, String $prenomProf, Float $newSalaire, String $newSpecialite) {
            $this->nom        = $nomProf; 
            $this->prenom     = $prenomProf;
            $this->salaire    = $newSalaire;
            $this->specialite = $newSpecialite;
        }

        //* ------------------SPECIALITE----------------------
        public function getSpecialite() :String {
            return $this->specialite;
        }   
        public function setSpecialite($newSpecialite) :Self {
            $this->speacialite =$newSpecialite;
            return $this;
        }

        public function __toString() :String{
            return parent::__toString() .", ma spécialité est : " . $this->specialite;
        }
    }     
?>