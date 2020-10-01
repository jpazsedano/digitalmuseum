<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Company;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/list", name="company-list")
     */
    public function list()
    {
        return $this->render('company/list.html.twig', [
            'controller_name' => 'CompanyController',
        ]);
    }

    /**
     * @Route("/show", name="company-show")
     */
    public function show(Company $company)
    {
        return $this->render('company/show.html.twig', [
            'company' => $company
        ]);
    }
}
