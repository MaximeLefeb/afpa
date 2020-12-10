<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Service\ProductService;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloWorldController extends AbstractController {

    /**
     * @Route("/showProducts", name="showProducts")
     */
    public function showAllProducts(ProductService $service) :Response {
        try {
            $produits = $service->showProducts();
        } catch (ServiceException $e) {
            return $this->render('hello_world/index.html.twig', [
                'Products' => [],
                'error' => $e->getMessage(),
            ]);
        }
    
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
            try {
                $service->addProduct($produit);
            } catch (ServiceException $e) {
                return $this->render('hello_world/index.html.twig', [
                    'Products' => [],
                    'error' => $e->getMessage(),
                ]);
            } 
        }

        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/modifyProduct/{id}", name="modifyProduct", requirements={"id","\d+"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function modifyProduct(ProductService $service, Produit $id, Request $request) :Response {
        $form = $this->createForm(ProduitType::class, $id);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $service->modifProduct();
            } catch (ServiceException $e) {
                return $this->render('hello_world/index.html.twig', [
                    'Products' => [],
                    'error' => $e->getMessage(),
                ]);
            } 
            return $this->redirectToRoute('showProducts');
        }
        
        return $this->render('hello_world/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("delProduct/{id}", name="delProduct",requirements={"id","\d+"},methods={"DELETE"}) 
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteProduct(Request $request,Produit $produit) :Response {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->request->get('_token'))) {
            try {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($produit);
                $entityManager->flush();
            } catch (ServiceException $e) {
                return $this->render('hello_world/index.html.twig', [
                    'Products' => [],
                    'error' => $e->getMessage(),
                ]);
            } 
        }
        return $this->redirectToRoute('showProducts');
    }
}
    