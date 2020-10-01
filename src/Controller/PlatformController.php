<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Platform;

/**
 * @Route("/platform")
 */
class PlatformController extends AbstractController
{
    /**
     * @Route("/list", name="platform-list")
     */
    public function list()
    {
        return $this->render('platform/list.html.twig', [
            'controller_name' => 'PlatformController',
        ]);
    }

    /**
     * @Route("/${id}", name="platform-show")
     */
    public function show(Platform $platform)
    {
        return $this->render('platform/show.html.twig', [
            'platform' => $platform
        ]);
    }
}
