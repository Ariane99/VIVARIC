<?php

namespace  App\Controller\Admin;

use App\Entity\Gastos;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GastosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gastos::class;
    }

    //AGREGAR COLUMNAS
    public function configureActions(Actions $actions): Actions
    {
        return $actions

            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Gasto");
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
            ->setEntityLabelInSingular('Gasto') //Form
            ->setEntityLabelInPlural('Gastos') //Index
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre_gasto')
            ->setTextAlign('center')
            ,
            
            TextareaField::new('descripcion')
                ->setTextAlign('center')
            ,
            NumberField::new('monto')
                ->setTextAlign('center')
            ,
        ];
    }
    
}
