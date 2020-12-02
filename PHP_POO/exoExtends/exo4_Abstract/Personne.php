<?php 

    abstract class Personne {
        protected $id;
        protected $nom;
        protected $prenom;
        protected $mail;
        protected $tel;
        protected $salaire;
        public static $counter = 0;

        public function __construct(Int $id, String $nom, String $prenom, String $mail, String $tel, Float $salaire){
            $this->id      = $id;
            $this->nom     = $nom;
            $this->prenom  = $prenom;
            $this->mail    = $mail;
            $this->tel     = $tel;
            $this->salaire =  $salaire;
            self::$counter++;
        }

        public function affiche() : void {
            echo $this;
        }

        abstract public function calculerSalaire() :Float;
    }
?>