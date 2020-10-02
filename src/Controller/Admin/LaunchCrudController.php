<?php

namespace App\Controller\Admin;

use App\Entity\Launch;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class LaunchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Launch::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield DateField::new('date');
        yield AssociationField::new('platform');
        yield AssociationField::new('videogame');
    }
}
