<?php   

    abstract class Employe {
        private $matricule;
        private $nom;
        private $prenom;
        private $birthday;
        protected static $salaire;

        //*MATRICULE ----------------------------------------
        public function getMatricule() :String {
            return $this->matricule;
        }
        public function setMatricule(String $matricule) :Self { 
            $this->matricule = $matricule;
            return $this;
        }
        //*NOM ----------------------------------------------
        public function getNom() :String {
            return $this->nom;
        }
        public function setNom(String $nom) :Self {
            $this->nom = $nom;
            return $this;
        }
        //*PRENOM --------------------------------------------
        public function getPrenom() :String {
            return $this->prenom;
        }
        public function setPrenom(String $prenom) :Self {
            $this->prenom = $prenom;
            return $this;
        }
        //*DATE DE NAISSANCE ----------------------------------
        public function getBirthday() :String {
            return $this->birthday;
        }
        public function setBirthday(String $birthday) :Self {
            $this->birthday = $birthday;
            return $this;
        }

        public function __toString() :String {
            return "[Matricule] -> " . $this->matricule . " [Nom] -> " . $this->nom . " [Prenom] -> " . $this->prenom . " [Date de naissance] -> " . $this->birthday . " [Salaire] -> " . self::$salaire;
        }

        abstract public function getSalaire() :Float ;
    }
?>