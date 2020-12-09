<?php 
namespace App\Service;

use App\Service\interfaceProduit\ProductInterface;
use Doctrine\ORM\EntityManagerInterface; 
use App\Repository\ProduitRepository;
use App\Entity\Produit;

class ProductService implements ProductInterface {
    private $repository;
    private $entityManager;

    public function __construct(ProduitRepository $repository, EntityManagerInterface $entityManager) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
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