<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class CompanyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Company::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('name'),
            Field::new('country'),
            DateField::new('foundation_date')
        ];
    }
}
