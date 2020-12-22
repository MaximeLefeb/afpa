<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="commande")
     */
    private $produit;

    public function __construct() {
        $this->produit = new ArrayCollection();
    }

    public function getId() :?int {
        return $this->id;
    }

    public function getPrixTotal() :?float {
        return $this->prixTotal;
    }
    public function setPrixTotal(float $prixTotal) :self {
        $this->prixTotal = $prixTotal;
        return $this;
    }

    public function getUser() :?User {
        return $this->user;
    }
    public function setUser(?User $user) :self {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduit() :Collection {
        return $this->produit;
    }

    public function addProduit(Produit $produit) :self {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
            $produit->setCommande($this);
        }
        return $this;
    }
    public function removeProduit(Produit $produit) :self {
        if ($this->produit->removeElement($produit)) {
            if ($produit->getCommande() === $this) {
                $produit->setCommande(null);
            }
        }
        return $this;
    }
}
