<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController {
    /**
     * @Route("/main", name="main")
     */
    public function index(EntityManagerInterface $manager, UserRepository $repo):Response {
        $user = new User();
        $user
            ->setPrenom("Auré")
            ->setNom("Destailleur")
            ->setPassword("123aze")
            ->setMail("Aurémail@gmail.com")
        ;

        try {
            $manager->persist($user);
            $manager->flush();
        } catch(DriverException $e) {
            $e->getMessage();
        }

        $users = $repo->findAll();

        return $this->render('main/index.html.twig', [
            'users' => $users,
            'user' => $user
        ]);
    }

    /**
     * @Route ("/register", name="register")
     */
    public function register(Request $request):Response {
        $form = $this->createForm();

        return $this->render('main/index.html.twig', [
            'users' => $users,
            'user' => $user
        ]);
    }

    /**
     * @Route ("/deleteUser/{id}", name="deleteUser")
     */
    public function deleteUser(Request $request, User $id):Response {
        try  {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($id);
            $manager->flush();
        } catch(DriverException $e ) {
            $e->getMessage();
        }

        return $this->render('main/delete.html.twig', [
            'succes' => 'suppression ok',
        ]);
    }
}
