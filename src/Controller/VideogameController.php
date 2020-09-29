<?php

namespace App\Controller;

use App\Repository\VideogameRepository;
use App\Entity\Videogame;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Twig\Environment;

class VideogameController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(VideogameRepository $videogameRepo)
    {
        // TODO: Utilizar el paginator. Hay que pasar el contenido paginado, el anterior y el siguiente.
        return new Response($this->twig->render('videogame/index.html.twig', [
            'videogames' => $videogameRepo->findAll(),
        ]));
    }

    /**
     * @Route("/videogame/{id}", name="videogame")
     */
    public function show(Videogame $videogame)
    {
        // Parece que symfony se encarga de hacer la query por id (ya que es la clave primaria)
        return new Response($this->twig->render('videogame/single.html.twig', [
            'videogame' => $videogame,
        ]));
    }
}
