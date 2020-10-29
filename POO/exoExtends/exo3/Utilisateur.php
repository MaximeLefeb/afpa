<?php 

    include_once 'Personne.php';
    include_once 'Profil.php';

   class Utilisateur extends Personne {
       private $login;
       private $password;
       private $service;
       private $profil;
       
       public function __construct(Personne $personne, String $userLogin, String $userPassword, String $userService, Profil $profil) {
            parent::__construct($personne->getId(), $personne->getNom(), $personne->getPrenom(), $personne->getMail(), $personne->getTel(), $personne->getSalaire());
            $this->login    = $userLogin;
            $this->password = $userPassword;
            $this->service  = $userService;
            $this->profil   = $profil;
       } 

        public function getUserLogin() :Int {
            return $this->id;
        }
        public function setUserLogin($newIdProfil) :Self {
            $this->id = $newIdProfil;
            return $this;
        }

        public function getUserPassword() :Int {
            return $this->id;
        }
        public function setUserPassword($newCodeProfil) :Self {
            $this->Code = $newCodeProfil;
            return $this;
        }

        public function getUserService() :Int {
            return $this->libelle;
        }
        public function setUserService($newLibelleProfil) :Self {
            $this->libelle = $newLibelleProfil;
            return $this;
        }

        public function getProfil() {
            return $this->profil;
        }
        public function setProfil($profil) {
            $this->profil = $profil;
            return $this;
        }

        public function __toString() :String {
            return parent::__toString() .
                    "[LOGIN] -> "     . $this->login . "\n" .
                    "[SERVICE] -> "  . $this->service;
        }

        public function calculerSalaire() :Float {
            if ($this->profil->getCode() == "MN") {
                return $this->salaire * 1.1;
            } else if ($this->profil->getCode() == "DG") {
                return $this->salaire * 1.4;
            }

            return $this->salaire;
        }

        public function affiche() :Void {
            echo $this;
        }
   } 

?>