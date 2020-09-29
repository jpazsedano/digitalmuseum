<?php

namespace App\Controller\Admin;

use App\Entity\Videogame;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VideogameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Videogame::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            Field::new('description'),
            Field::new('genre'),
            AssociationField::new('developer'),
            AssociationField::new('distributor'),
            AssociationField::new('gameLists')->hideOnForm(),
            AssociationField::new('galleries')->hideOnForm()
        ];
    }
}
