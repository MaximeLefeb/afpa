<?php 

    class Utilisateur {
        private $id;
        private $typeOfUser;
        private $mail;
        private $pwd;

        //* ------------------GETTER SETTER---------------------
        public function getId() :?Int {
            return $this->id;
        }

        public function getTypeOfUser() :String {
            return $this->typeOfUser;
        }

        public function getMail() :String {
            return $this->mail;
        }
        public function setMail(String $mail) :Self {
            $this->mail = $mail;
            return $this;
        }

        public function getPwd() :String {
            return $this->pwd;
        }
        public function setPwd(String $pwd) :Self {
            $this->pwd = $pwd;
            return $this;
        }
        //* --------------------TO STRING-----------------------
        public function __toString() {
            return $this->id . $this->mail . $this->typeOfUser . $this->pwd;
        }
    }

?>