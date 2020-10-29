<?php

    class Profil {
        private $id;
        private $code;
        private $libelle;

        public function __construct(Int $idProfil, String $codeProfil, String $libelleProfil) {
            $this->id      = $idProfil;
            $this->code    = $codeProfil;
            $this->libelle = $libelleProfil;
        }

        public function getIdProfil() :Int {
            return $this->id;
        }

        public function getCodeProfil() :Int {
            return $this->id;
        }
        public function setCodeProfil($newCodeProfil) :Self {
            $this->Code = $newCodeProfil;
            return $this;
        }

        public function getLibelleProfil() :Int {
            return $this->libelle;
        }
        public function setLibelleProfil($newLibelleProfil) :Self {
            $this->libelle = $newLibelleProfil;
            return $this;
        }

        public function __toString(){
            return $this->libelle;
        }
    }
?>