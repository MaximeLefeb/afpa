<?php 
    class Personne {    
        protected $id;
        protected $nom;
        protected $prenom;
        
        public function __construct(String $newNom, String $newPrenom){
            $this->nom    = $newNom;
            $this->prenom = $newPrenom;
        }

        //* ------------------INT------------------
        public function getId() :Int{
            return $this->$id;
        }
        public function setId(Int $newId) :Self{
            $this->$id = $newId;
            return $this;
        }
        //* ------------------NOM------------------
        public function getNom() :String{
            return $this->nom;
        }
        public function setNom(String $newNom) :Self{
            $this->nom = $newNom;
            return $this;
        }
        //* -----------------PRENOM-----------------
        public function getPrenom() :String{
            return $this->$prenom;
        }
        public function setPrenom(String $newPrenom) :Self{
            $this->prenom = $newPrenom;
            return $this;
        }

        public function __toString() :string{
            return "Je suis " . $this->prenom . ", " . $this->nom;  
        }
    }
?>