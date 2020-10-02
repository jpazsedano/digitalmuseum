<?php

namespace App\Controller;

use App\Repository\VideogameRepository;
use App\Entity\Videogame;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Twig\Environment;

/**
 * @Route("/videogame")
 */
class VideogameController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/list", name="game-list")
     */
    public function list(VideogameRepository $videogameRepo)
    {
        // TODO: Utilizar el paginator. Hay que pasar el contenido paginado, el anterior y el siguiente.
        return new Response($this->twig->render('videogame/list.html.twig', [
            'videogames' => $videogameRepo->findAll(),
        ]));
    }

    /**
     * @Route("/{id}", name="game-show")
     */
    public function show(Videogame $videogame)
    {
        // Parece que symfony se encarga de hacer la query por id (ya que es la clave primaria)
        return new Response($this->twig->render('videogame/show.html.twig', [
            'videogame' => $videogame,
        ]));
    }
}
