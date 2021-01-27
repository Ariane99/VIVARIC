<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
////////////

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

    //AGREGAR COLUMNAS
    public function configureActions(Actions $actions): Actions
    {
        return $actions

            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Articulo");
            })

            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fas fa-pen-square')->setLabel(" Editar");
            })

            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fas fa-eraser')->setLabel(" Eliminar");
            })
        ;
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
