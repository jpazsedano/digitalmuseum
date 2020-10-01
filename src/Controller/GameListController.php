<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\GameList;

/**
 * @Route("/selection")
 */
class GameListController extends AbstractController
{
    /**
     * @Route("/list", name="selection-list")
     */
    public function list()
    {
        return $this->render('game_list/index.html.twig', [
            'controller_name' => 'GameListController',
        ]);
    }

    /**
     * @Route("/show", name="selection-show")
     */
    public function show(GameList $list)
    {
        return $this->render('game_list/show.html.twig', [
            'selection' => $list
        ]);
    }
}
