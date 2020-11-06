<?php 
    class Employe {
        private $id;
        private $nom;
        private $prenom;
        private $emp;
        private $emb;
        private $sup;
        private $sal;
        private $comm;
        private $noServ;
        private $noProj;

        //* ---------------------------ID-------------------------------
        public function getId() :int{
            return $this->id;
        }
        public function setId($newId) :self{
            $this->id = $newId;
            return $this;
        }
        //* ---------------------------NOM------------------------------
        public function getNom() :string{
            return $this->nom;
        }
        public function setNom($newNom) :self{
            $this->nom = $newNom;
            return $this;
        }
        //* ---------------------------PRENOM---------------------------
        public function getPrenom() :string{
            return $this->prenom;
        }
        public function setPrenom($newPrenom) :self{
            $this->prenom = $newPrenom;
            return $this;
        }
        //* ---------------------------EMPLOI---------------------------
        public function getEmp() :string{
            return $this->emp;
        }
        public function setEmp($newEmp) :self{
            $this->emp = $newEmp;
            return $this;
        }
        //* ---------------------------SUPERIEUR------------------------
        public function getSup() :int{
            return $this->sup;
        }
        public function setSup($newSup) :self{
            $this->sup = $newSup;
            return $this;
        }
        //* ---------------------------EMAUCHE---------------------------
        public function getEmb() :DateTime {
            return $this->emb;
        }
        public function setEmb($newEmb) :self{
            $dateEmb = new datetime($newEmb);
            $this->emb = $dateEmb;
            return $this;
        }
        //* ---------------------------SAL-------------------------------
        public function getSal() :Float {
            return $this->sal;
        }
        public function setSal($newSal) :self {
            $this->sal = $newSal;
            return $this;
        }
        //* ---------------------------COMM------------------------------
        public function getComm() :int{
            return $this->comm;
        }   
        public function setComm($newComm) :self{
            $this->comm = $newComm;
            return $this;
        }
        //* ---------------------------NoSERV----------------------------
        public function getNoServ() :int{
            return $this->noServ;
        }
        public function setNoServ($newNoServ) :self{
            $this->noServ = $newNoServ;
            return $this;
        }
        //* ---------------------------NoPROJ----------------------------
        public function getNoProj() :int{
            return $this->noProj;
        }   
        public function setNoProj($newNoProj) :self{
            $this->noProj = $newNoProj;
            return $this;
        }

        public function __toString() :string{
            return " [id]     : " . $this->id . 
                    " [nom]   : " . $this->nom . 
                    " [prenom]: " . $this->prenom . 
                    " [emp]   : " . $this->emp . 
                    " [sup]   : " . $this->sup . 
                    " [emb]   : " . $this->emb .
                    " [comm]  : " . $this->comm . 
                    " [noServ]: " . $this->noServ .
                    " [noProj]: " . $this->noProj;
        }
    }

?> 