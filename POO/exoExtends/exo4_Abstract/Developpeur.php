<?php
    include_once 'Personne.php';

    class Developpeur extends Personne{
        private $_specialite;

        public function __construct(Int $id, String $nom, String $prenom, String $mail, String $tel, Float $salaire, String $_specialite) {
            parent::__construct($id,$nom,$prenom,$mail,$tel,$salaire);
            $this->_specialite = $_specialite;
        }

        public function getSpecialite() :String {
            return $this->_specialite;
        }
        public function setSpecialite($_specialite) :Self {
            $this->_specialite = $_specialite;
            return $this;
        }

        public function calculerSalaire() :float{
            return $this->salaire * 1.35;
        }

        public function __toString() :String {
            return "Le salaire du développeur " . $this->nom . " " . $this->prenom . "est : " . $this->salaire . ", sa spécialité :" . $this->_specialite;
        }
    }
?>