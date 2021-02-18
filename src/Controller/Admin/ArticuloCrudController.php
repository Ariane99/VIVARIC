<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
////////////

use App\Entity\Articulo;

use App\Entity\Categoria;//tratando de llamar de otra entidad

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

    //Configuracion de los 3 puntos
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsAsDropdown()
            ->setEntityLabelInSingular('Articulo') //Form
            ->setEntityLabelInPlural('Articulos') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombreArt','Nombre del Articulo')
                ->setTextAlign('center')
            ,
            TextEditorField::new('detalle')
                ->setTextAlign('center')
            ,
            TextField::new('modelo')
                ->setTextAlign('center')
            ,            
            TextField::new('color')
                ->setTextAlign('center')
            ,            
            TextField::new('dimension')
                ->setTextAlign('center')
            ,
            IntegerField::new('stock')
                ->setTextAlign('center')
            ,
            AssociationField::new('categoria')
                ->setTextAlign('center')
            ,
        ];
    }

}
