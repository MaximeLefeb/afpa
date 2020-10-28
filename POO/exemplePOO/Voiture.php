<?php

class Voiture {

    private $marque;
    private $modele;
    private $anneeModele;

    // public function __construct(string $newMarque, string $newModele, int $newAnneeModele){
    //     $this->marque = $newMarque;
    //     $this->modele = $newModele;
    //     $this->anneeModele = $newAnneeModele;
    // }

    public function sePresenter(): string{
        return "Je suis une voiture ! de marque " . $this->marque . 
        " modèle " . $this->modele . " de l'année " . $this->anneeModele;
    }

    public function getMarque() :string{
        return $this->marque;
    }

    public function setMarque(string $newMarque) :self{
        $this->marque = $newMarque;
        return $this;
    }

    public function getModele() : string{
        return $this->modele;
    }

    public function setModele(string $newModele): self{
        $this->modele = $newModele;
        return $this;
    }

    public function getAnneeModele() : int{
        return $this->anneeModele;
    }

    public function setAnneeModele(int $newAnneeModele) :self{
        $this->anneeModele = $newAnneeModele;
        return $this;
    }

    public function __toString() :string
    {
        return " [Marque] :" . $this->marque . 
        " [Modele] :" . $this->modele . " [Annee du modele] :" . $this->anneeModele;
    }
}