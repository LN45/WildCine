<?php

namespace App\Controller;

use App\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor/{id}", name="actor_show", methods="GET", requirements={"id" = "\d+"})
     * @param Actor $actor
     * @return Response
     */
    public function show(Actor $actor) : Response
    {
        $movies=$actor->getMovies();
        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
            'movies' => $movies
        ]);
    }
}
