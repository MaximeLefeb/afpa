<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Service\ProductService;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloWorldController extends AbstractController {

    /**
     * @Route("/showProducts", name="showProducts")
     */
    public function showAllProducts(ProductService $service) :Response {
        $produits = $service->showProducts();

        return $this->render('hello_world/index.html.twig', [
            'Products' => $produits,
        ]);
    }

    /**
     * @Route("/addProduct", name="addProduct")
     */
    public function formAddProduct(ProductService $service, Request $request) :Response {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $service->addProduct($produit);
            return $this->redirectToRoute('showProducts');
        }

        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/modifyProduct/{id}", name="modifyProduct", requirements={"id","\d+"})
     */
    public function modifyProduct(ProductService $service, Produit $id, Request $request) :Response {
        $form = $this->createForm(ProduitType::class, $id);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $service->modifProduct();
            return $this->redirectToRoute('showProducts');
        }
        
        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("delProduct/{id}", name="delProduct",requirements={"id","\d+"},methods={"DELETE"}) 
     */
    public function deleteProduct(Request $request,Produit $produit) :Response {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }
        
        return $this->redirectToRoute('showProducts');
    }
}
    