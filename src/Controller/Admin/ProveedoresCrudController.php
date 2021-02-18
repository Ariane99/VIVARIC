<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Proveedores;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProveedoresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proveedores::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Proveedor");
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
            ->setEntityLabelInSingular('Proveedor') //Form
            ->setEntityLabelInPlural('Proveedores') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre_prov', 'Nombre Proveedor')
                ->setTextAlign('center')
            ,
            EmailField::new('email_prov', 'Email')
                ->setTextAlign('center')
            ,
            NumberField::new('ci_prov', 'Ci')
                ->setTextAlign('center')
            ,
            TextField::new('direccion_prov','Direccion')
                ->setTextAlign('center')
            ,
            TextField::new('telefono_prov', 'Telefono')
            ->setTextAlign('center')
            ,
        ];
    }
}
