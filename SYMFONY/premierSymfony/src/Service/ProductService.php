<?php 
namespace App\Service;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Component\Security\Core\Security;
use App\Service\interfaceProduit\ProductInterface;

class ProductService implements ProductInterface {
    private $repository;
    private $entityManager;
    private $security;

    public function __construct(ProduitRepository $repository, EntityManagerInterface $entityManager, Security $security) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public function getUser() {
        $user = $this->security->getUser();
    }

    public function addProduct(Object $produit) :Void {
        $this->entityManager->persist($produit);
        $this->entityManager->flush();
    }

    public function modifProduct() :Void {
        $this->entityManager->flush();
    }

    public function showProducts() :?Array{
        try {
            return $this->repository->findAll();
        } catch (DriverException $e) {
            throw new ServiceException("Error Processing Request");
        }
    }

    public function delProduct(Object $id) :Void {
        $produit = $this->repository->find($id);
        $this->produitManager->remove($produit);
        $this->produitManager->flush();
    }
}