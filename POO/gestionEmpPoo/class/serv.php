<?php 
    class Service {
        private $idService;
        private $service;
        private $ville;

        //* ---------------------------IDSERVICE-------------------------------
        public function getIdService() :int{
            return $this->idService;
        }
        public function setIdService($newIdService) :self{
            $this->idService = $newIdService;
            return $this;
        }
        //* ---------------------------SERVICE---------------------------------
        public function getService() :string{
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