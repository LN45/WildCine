<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, MovieRepository $movieRepository): Response
    {
        $em = $this->getDoctrine()->getManager()->getRepository(Movie::class);
        $movies = $em->findAll();






        return $this->render('home/index.html.twig', [
            'movies' => $movies
        ]);
    }
}
