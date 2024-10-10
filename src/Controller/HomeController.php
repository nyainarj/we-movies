<?php

namespace App\Controller;

use App\Helper\MovieDBHelper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    private MovieDBHelper $movieDBHelper;

    public function __construct(MovieDBHelper $movieDBHelper)
    {
        $this->movieDBHelper = $movieDBHelper;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $genders = $this->movieDBHelper->getMovieGenders();
        $movieList = $this->movieDBHelper->getMovies();
        $bestMovie = $this->movieDBHelper->getBestMovie();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bestMovie' => $bestMovie,
            'genders' => $genders,
            'movies' => $movieList->results
        ]);
    }
}
