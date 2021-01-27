<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
////////////

use App\Entity\Categoria;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoriaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categoria::class;
    }

    //AGREGAR COLUMNAS
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                  return $action->setIcon('fas fa-plus-square')->setLabel(" Nueva Categoria");
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
            TextField::new('nombreCat','Nombre del Articulo'),
            TextEditorField::new('descripcion','Descripcion del Articulo'),
        ];
    }
}