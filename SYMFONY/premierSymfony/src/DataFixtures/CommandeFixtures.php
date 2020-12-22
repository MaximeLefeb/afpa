<?php

namespace App\DataFixtures;

use App\Service\ProductService;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture {
    private $security;
    private $entityManager;

    public function __construct(Security $security, EntityManagerInterface $entityManager) {
        $this->security = $security;    
        $this->entityManager = $entityManager;
    }

    public function load(ObjectManager $manager) {
        $commande = new Commande();
        $commande
            ->setPrixTotal(0)
            ->setUser($this->security->getUser())
            ->addProduit($produit = new Produit()
                )
        ;
    }
}
