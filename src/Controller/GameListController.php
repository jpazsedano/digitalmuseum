<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\GameList;
use App\Repository\GameListRepository;

/**
 * @Route("/selection")
 */
class GameListController extends AbstractController
{
    /**
     * @Route("/list", name="selection-list")
     */
    public function list(GameListRepository $selectionRepo)
    {
        return $this->render('game_list/index.html.twig', [
            'selections' => $selectionRepo->findAll()
        ]);
    }

    /**
     * @Route("/show/{id}", name="selection-show")
     */
    public function show(GameList $list)
    {
        return $this->render('game_list/show.html.twig', [
            'selection' => $list
        ]);
    }
}
