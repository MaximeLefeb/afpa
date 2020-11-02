<?php
    include_once 'Personne.php';

    class Developpeur extends Personne{
        private $specialite;

        public function __construct(Int $id, String $nom, String $prenom, String $mail, String $tel, Float $salaire, String $specialite) {
            parent::__construct($id,$nom,$prenom,$mail,$tel,$salaire);
            $this->specialite = $specialite;
        }

        public function getSpecialite() :String {
            return $this->specialite;
        }
        public function setSpecialite($newSpecialite) :Self {
            $this->_specialite = $newSpecialite;
            return $this;
        }

        public function calculerSalaire() :float{
            return $this->salaire * 1.2;
        }

        public function affiche() :String {
            return "Le salaire du développeur " . $this->nom . " " . $this->prenom . "est : " . $this->salaire . ", sa spécialité :" . $this->specialite;
        }
    }
?>