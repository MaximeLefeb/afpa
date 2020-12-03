<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController {

    /**
     * @Route("/showProduct", name="showProduct")
     */
    public function showAllProduct(): Response {
        return $this->render('hello_world/index.html.twig', [
            'Product' => ['Télévision', 'Micro-onde', 'Ventilateur', 'chaise'],
            'monNom' => 'Maxime Lefebvre',
        ]);
    }

    /**
     * @Route("/addProduct", name="addProduct")
     */
    public function formAddProduct(): Response {
        return $this->render('hello_world/addProduct.html.twig', [
            'monNom' => 'Maxime Lefebvre',
        ]);
    }
}
