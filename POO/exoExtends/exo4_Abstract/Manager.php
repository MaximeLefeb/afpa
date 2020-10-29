<?php 
    include_once 'personne.php';

    class Manager extends Personne{
        private $_service;

        public function __construct(Int $id, String $nom, String $prenom, String $mail, String $tel, Float $salaire, String $_service){
            parent::construct($id,$nom,$prenom,$mail,$tel,$salaire);
            $this->_service = $_service;
        }

        public function getService() :String {
            return $this->_service;
        }
        public function setService($newService) :Self {
            $this->_service = $newService;
            return $this;
        }

        public function calculerSalaire() :float{
            return $this->salaire * 1.2;
        }
        
        public function __toString() :String {
            return "Le salaire du développeur " . $this->nom . " " . $this->prenom . "est : " . $this->salaire . ", son service :" . $this->_service;;
        }

        public function affiche() :Void {}
    }
?>