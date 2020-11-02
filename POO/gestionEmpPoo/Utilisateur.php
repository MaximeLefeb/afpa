<?php 

    class Utilisateur {
        private $id = NULL;
        private $mail;
        private $typeOfUser;
        private $pwd;

        public function getMail() :String {
            return $this->mail;
        }
        public function setMail(String $mail) :Self {
            $this->mail = $mail;
            return $this;
        }

        public function getTypeOfUser() :String {
            return $this->typeOfUser;
        }
        public function setTypeOfUser(String $typeOfUser) :Self {
            $this->typeOfUser = $typeOfUser;
            return $this;
        }

        public function getPwd() :String {
            return $this->pwd;
        }
        public function setPwd(String $pwd) :Self {
            $this->pwd = $pwd;
            return $this;
        }

        public function getId() :?Int {
            return $this->id;
        }

        public function __toString() {
            return $this->id . " " . $this->mail . " " . $this->typeOfUser . " " . $this->pwd;
        }
    }
?>