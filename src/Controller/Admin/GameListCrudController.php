<?php

namespace App\Controller\Admin;

use App\Entity\GameList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class GameListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GameList::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field::new('name');
        yield Field::new('description');
        yield AssociationField::new('videogames');
    }
}
