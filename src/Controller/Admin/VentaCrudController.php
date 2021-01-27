<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
////////////

use App\Entity\Venta;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Venta::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nueva Venta");
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
            TextField::new('cicliente','CI Cliente'),
            TextField::new('nombrecliente','Nombre Cliente'),
            TextField::new('ciudad','Ciudad Cliente'),
            TextField::new('tipo_comprobante','Tipo de Comprobante'),
            TextField::new('serie_comprobante','Serie de Comprobante'),
            TextField::new('num_comprobante','N° de Comprobante'),
            DateTimeField::new('fecha_hora','Fecha y Hora')->setFormat('M/d/yy H:mm'),
            NumberField::new('impuesto'),
            TextField::new('estado'),
            NumberField::new('total_venta','Total de Venta'),
            AssociationField::new('persona'),
        ];
    }
}
