<?php 
    include_once 'personne.php';

    class Manager extends Personne{
        private $service;

        public function __construct(Int $id, String $nom, String $prenom, String $mail, String $tel, Float $salaire, String $service){
            parent::__construct($id,$nom,$prenom,$mail,$tel,$salaire);
            $this->service = $service;
        }

        public function getService() :String {
            return $this->service;
        }
        public function setService(String $newService) :Self {
            $this->_service = $newService;
            return $this;
        }

        public function calculerSalaire() :float{
            return $this->salaire * 1.35;
        }
        
        public function affiche() :Void {
            echo "Le salaire du développeur " . $this->nom . " "  . $this->prenom . "est : " . $this->salaire . ", son service :" . $this->service; 
        }
    }
?>