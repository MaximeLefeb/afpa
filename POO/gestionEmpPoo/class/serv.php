<?php 
    class Employes {
        private $idService;
        private $service;
        private $ville;

        public function __construct(Int $newIdService, String $newService, String $newVille){
            $this->id     = $newIdService;
            $this->nom    = $newService;
            $this->prenom = $newVille;
        }

        //* ---------------------------IDSERVICE-------------------------------
        public function getIdService() :int{
            return $this->idService;
        }
        public function setIdService($newIdService) :self{
            $this->idService = $newIdService;
            return $this;
        }
        //* ---------------------------SERVICE---------------------------------
        public function getSerivce() :string{
            return $this->service;
        }
        public function setService($newService) :self{
            $this->service = $newService;
            return $this;
        }
        //* ---------------------------VILLE-----------------------------------
        public function getVille() :string{
            return $this->ville;
        }
        public function setVille($newVille) :self{
            $this->ville = $newVille;
            return $this;
        }

        public function __toString() :string{
            return " [Id service]: " . $this->idService . 
                    " [Service]  : " . $this->service .
                    " [Ville]    : " . $this->ville;
        }
    }

?> 