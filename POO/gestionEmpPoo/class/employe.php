<?php 
    class Employe implements JsonSerializable {
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
        public static $counter = 0;

        public function __construct() {
            self::$counter++;
        }
        //* ---------------------------ID-------------------------------
        public function getId() :int{
            return $this->id;
        }
        public function setId(Int $newId) :self{
            $this->id = $newId;
            return $this;
        }
        //* ---------------------------NOM------------------------------
        public function getNom() :string{
            return $this->nom;
        }
        public function setNom(String $newNom) :self{
            $this->nom = $newNom;
            return $this;
        }
        //* ---------------------------PRENOM---------------------------
        public function getPrenom() :string{
            return $this->prenom;
        }
        public function setPrenom(String $newPrenom) :self{
            $this->prenom = $newPrenom;
            return $this;
        }
        //* ---------------------------EMPLOI---------------------------
        public function getEmp() :string{
            return $this->emp;
        }
        public function setEmp(String $newEmp) :self{
            $this->emp = $newEmp;
            return $this;
        }
        //* ---------------------------SUPERIEUR------------------------
        public function getSup() :?int{
            return $this->sup;
        }
        public function setSup(?Int $newSup) :self{
            $this->sup = $newSup;
            return $this;
        }
        //* ---------------------------EMAUCHE---------------------------
        public function getEmb() :?DateTime {
            return $this->emb;
        }
        public function setEmb(?String $newEmb) :self{
            $dateEmb = new datetime($newEmb);
            $this->emb = $dateEmb;
            return $this;
        }
        //* ---------------------------SAL-------------------------------
        public function getSal() :Float {
            return $this->sal;
        }
        public function setSal(?Float $newSal) :self {
            $this->sal = $newSal;
            return $this;
        }
        //* ---------------------------COMM------------------------------
        public function getComm() :?int{
            return $this->comm;
        }   
        public function setComm(?Float $newComm) :self{
            $this->comm = $newComm;
            return $this;
        }
        //* ---------------------------NoSERV----------------------------
        public function getNoServ() :int{
            return $this->noServ;
        }
        public function setNoServ(Int $newNoServ) :self{
            $this->noServ = $newNoServ;
            return $this;
        }
        //* ---------------------------NoPROJ----------------------------
        public function getNoProj() :?int{
            return $this->noProj;
        }   
        public function setNoProj(?Int $newNoProj) :self{
            $this->noProj = $newNoProj;
            return $this;
        }

        //*Convert datetime -> String
        public function datetimeToString($datetime) :?String {
            return $dateToString = $datetime->format('Y-m-d');
        }

        //*Encode json
        public function jsonSerialize() {
            return [
                'Id'         => $this->getId(),
                'Nom'        => $this->getNom(),
                'Prenom'     => $this->getPrenom(),
                'Emploi'     => $this->getEmp(),
                'Superieur'  => $this->getSup(),
                'Embauche'   => $this->datetimeToString($this->getEmb()),
                'Salaire'    => $this->getSal(),
                'Commission' => $this->getComm(),
                'noService'  => $this->getNoServ(),
                'noProjet'   => $this->getNoProj()
            ];
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