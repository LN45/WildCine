<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Director;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Production;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @param MovieRepository $movieRepository
     * @return Response
     * @throws \Exception
     */
    public function index(MovieRepository $movieRepository): Response
    {
        $user=$this->getUser();
        $movies = $this->getDoctrine()->getManager()->getRepository(Movie::class)->findAll();
        $moviesnew = $movieRepository->findMoviesBetweenTwoDates();
        $bestmovies = $movieRepository->findBestMovies();


        return $this->render('home/index.html.twig', [
            'movies' => $movies,
            'moviesnew' => $moviesnew,
            'bestmovies' => $bestmovies,
            'user' => $user
        ]);
    }
}
