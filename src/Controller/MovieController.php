<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

//    /**
//     * @Route("/search", name="movie_search", methods="GET")
//     * @param Request $request
//     * @return Response
//     */
//    public function searchMovies(Request $request)
//    {
//        $q = $request->query->get('q');
//        $results = $this->getDoctrine()->getRepository('App:Movie')->findBy($q);
//
//        return $this->render('home/search.json.twig', [
//            'results' => $results
//        ]);
//    }
//
//    /**
//     * @param null $id
//     * @return \Symfony\Component\HttpFoundation\JsonResponse
//     */
//    public function getMovie($id = null)
//    {
//        $movie = $this->getDoctrine()->getRepository('App:Movie')->find($id);
//
//        return $this->json($movie->getName());
//    }
}
