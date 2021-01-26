<?php

namespace App\Controller\Admin;

use App\Entity\Articulo;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticuloCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articulo::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombreArt','Nombre del Articulo'),
            TextEditorField::new('detalle'),
            TextField::new('modelo'),            
            TextField::new('color'),            
            //ColorField::new('color'),
            TextField::new('dimension'),
            IntegerField::new('stock'),
            AssociationField::new('categoria')
        ];
    }

}
