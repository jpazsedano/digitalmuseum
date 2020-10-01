<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', []);
    }

    /**
     * @Route("/search", name="search")
     */
    public function search()
    {
        return $this->render('index/search.html.twig');
    }
}
