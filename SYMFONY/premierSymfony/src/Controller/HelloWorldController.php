<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Form\ProduitType;
use App\Entity\Produit;

class HelloWorldController extends AbstractController {

    /**
     * @Route("/showProduct", name="showProduct")
     */
    public function showAllProduct(ProduitRepository $repository): Response {
        $produits = $repository->findAll();

        return $this->render('hello_world/index.html.twig', [
            'Products' => $produits,
            'monNom' => 'Maxime Lefebvre',
        ]);
    }

    /**
     * @Route("/addProduct", name="addProduct")
     */
    public function formAddProduct(): Response {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        //Auto complete form 

        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delProduct", name="delProduct")
     */
    public function deleteProduct(): Response {
        return $this->render('hello_world/delProduct.html.twig', [
            'monNom' => 'Maxime Lefebvre',
        ]);
    }

    /**
     * @Route("/modifyProduct", name="modifyProduct")
     */
    public function modifyProduct(): Response {
        $produit = new Produit();
        $produit->setDesignation('Chaise')->setPrix(150);
        $form = $this->createForm(ProduitType::class, $produit);
        //Auto complete form 

        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
