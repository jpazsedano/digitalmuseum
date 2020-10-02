<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Company;
use App\Repository\CompanyRepository;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/list", name="company-list")
     */
    public function list(CompanyRepository $companyRepo)
    {
        return $this->render('company/list.html.twig', [
            'companies' => $companyRepo->findAll()
        ]);
    }

    /**
     * @Route("/show/{id}", name="company-show")
     */
    public function show(Company $company)
    {
        return $this->render('company/show.html.twig', [
            'company' => $company
        ]);
    }
}
