<?php

namespace App\Controller;


use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render('category/index.html.twig', [
            'genres' => $genres,
        ]);
    }
}
