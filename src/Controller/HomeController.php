<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Form\SearchType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, MovieRepository $movieRepository): Response
    {
        $user=$this->getUser();
        $movies = $this->getDoctrine()->getManager()->getRepository(Movie::class)->findAll();
        $moviesnew = $movieRepository->findMoviesBetweenTwoDates();
        $bestmovies = $movieRepository->findBestMovies();
        $actors = $this->getDoctrine()->getRepository(Actor::class)->findAll();
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();

        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted()){
            $data = $form->getData();
            $movieSearch = $movieRepository->search($data['search']);
            return $this->render("movie/search.html.twig", [
                'movieSearch' => $movieSearch
            ]);
        }

        return $this->render('home/index.html.twig', [
            'movies' => $movies,
            'moviesnew' => $moviesnew,
            'bestmovies' => $bestmovies,
            'user' => $user,
            'actors' => $actors,
            'genres' => $genres,
            'form' => $form->createView(),
        ]);
    }
}
