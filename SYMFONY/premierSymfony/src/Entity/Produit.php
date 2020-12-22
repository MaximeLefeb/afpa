<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le désignation ne doit pas être vide")
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La désignation doit comporter au moins {{limit}} caractères",
     *      maxMessage = "La désignation comporte au maximum {{limit}} caractères")
     */
    private $designation;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Le prix ne doit pas être vide")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    public function __construct() {
        $this->user = new ArrayCollection();
    }

    public function getId() :?int {
        return $this->id;
    }

    public function getDesignation() :?string {
        return $this->designation;
    }
    public function setDesignation(string $designation) :self {
        $this->designation = $designation;
        return $this;
    }

    public function getPrix() :?float {
        return $this->prix;
    }
    public function setPrix(float $prix) :self {
        $this->prix = $prix;
        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
