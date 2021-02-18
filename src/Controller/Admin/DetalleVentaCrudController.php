<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
///////////////////

use App\Entity\DetalleVenta;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetalleVentaCrudController extends AbstractCrudController  
{
    public static function getEntityFqcn(): string
    {
        return DetalleVenta::class;
    }

    //Configuracion de los 3 puntos
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsAsDropdown()
            ->setEntityLabelInSingular('Detalle de Venta') //Form
            ->setEntityLabelInPlural('Detalles de Venta') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('precio_venta','Precio de Venta')
                ->setTextAlign('center')
            ,
            IntegerField::new('cantidad')
                ->setTextAlign('center')
            ,
            AssociationField::new('venta')
                ->setTextAlign('center')
            ,
            AssociationField::new('articulo')
                ->setTextAlign('center')
            ,
        ];
    }
}
