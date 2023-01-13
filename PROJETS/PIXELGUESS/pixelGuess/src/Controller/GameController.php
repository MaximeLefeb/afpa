<?php

namespace App\Controller;

use App\Entity\Guess;
use App\Repository\GuessRepository;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController {
    /**
     * @Route("/game/{type}", name="game", methods={"GET"})
     */
    public function index(string $type, GuessRepository $repo):Response {
        $type = strtolower($type);

        if ($type === 'serie' || $type === 'marque' || $type === 'tous' || $type === 'anime' || $type === 'cinema' || $type === 'jeux') {
            $result = $repo->findBy(["type" => $type]);

            return $this->render('game/game.html.twig', [
                'type'  => $type,
                'guess' => $result[array_rand($result)]
            ]);
        } else {
            return $this->render('errors/404.html.twig', [
                'Error' => "L'url demandé n'existe pas"
            ]);
        }
    }

    protected function shuffleGuess():void {
        // Mélanger le tableau si id identique
        
        // return guess 
    }

    /**
     * @Route("/play", name="play", methods={"POST"})
     */
    public function play(int $previousId, string $game_type, GuessRepository $repo) {
        $result = $repo->findBy(["type" => $game_type]);
        $guess  = $result[array_rand($result)];

        if ($guess->getId() === $previousId) {
            # code...
        } else {
            $guess = shuffle( $guess[array_rand($guess)] );
        }
    }

    /**
     * Check if submited keyword is correct
     * @Route("/guess/{keyword}", name="guess", methods={"GET"})
     */
    public function guess(string $keyword, GuessRepository $repo, Request $request):Response {
        $id    = $request->query->get('request');
        $guess = $repo->findOneBy(["id" => $id]);

        if ($guess->getKeyword() === $keyword) {
            return new Response('1', 200, ['Content-Type' => 'text/html']);
        } else {
            return new Response('0', 200, ['Content-Type' => 'text/html']);
        }
    }
}