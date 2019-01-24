<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/{id}", name="movie_show", methods="GET", requirements={"id" = "\d+"})
     * @param Movie $movie
     * @return Response
     */
    public function show(Movie $movie): Response
    {
        $actors=$movie->getActor();
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
            'actors' => $actors
        ]);
    }
}
