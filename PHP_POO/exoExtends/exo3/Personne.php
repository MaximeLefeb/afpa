<?php 

    class Personne {
        protected $id;
        protected $nom;
        protected $prenom;
        protected $mail;
        protected $tel;
        protected $salaire;

        public function __construct(Int $newId, String $newNom, String $newPrenom, String $newMail, String $newTel, Float $newSalaire) {
            $this->id      = $newId;
            $this->nom     = $newNom;
            $this->prenom  = $newPrenom;
            $this->mail    = $newMail;
            $this->tel     = $newTel;
            $this->salaire = $newSalaire;
        }

        //* ------------------------ID------------------------
        public function getId() :Int {
            return $this->id;
        }
        //! Le setId est inutile si il est en autoIncrement 

        //* ------------------------NOM------------------------
        public function getNom() :String {
            return $this->nom;
        }
        public function setNom($nomPersonne) :Self{
            $this->nom = $nomPersonne;
            return $this;
        }

        //* ------------------------PRENOM------------------------
        public function getPrenom() :String {
            return $this->prenom;
        }
        public function setPrenom($prenomPersonne) :Self {
            $this->prenom = $prenomPersonne;
            return $this;
        }

        //* ------------------------MAIL------------------------
        public function getMail() :String {
            return $this->mail;
        }
        public function setMail($mailPersonne) :Self{
            $this->mail = $mailPersonne;
            return $this;
        }

        //* ------------------------TEL------------------------
        public function getTel() :String{
            return $this->tel;
        }
        public function setTel($telPersonne) :Self {
            $this->tel = $telPersonne;
            return $this;
        }

        //* ------------------------SALAIRE------------------------
        public function getSalaire() :Float {
            return $this->salaire;
        }
        public function setSalaire($salairePersonne) :Self {
            $this->salaire = $salairePersonne;
            return $this;
        }

        public function __toString() :String{
            return "[NOM] -> "     . $this->nom . "\n" .
                    "[PRENOM] -> "  . $this->prenom . "\n";
        }

        public function calculerSalaire() :Float {
            return $this->salaire;
        }

        public function affiche() :void {
            echo $this;
        }
    }
?> 