<?php

namespace App\Controller\Admin;

////////////PRUEBA
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
///////////////////

use App\Entity\DetalleIngreso;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetalleIngresoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetalleIngreso::class;
    }

    //Configuracion de los 3 puntos
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsAsDropdown()
            ->setEntityLabelInSingular('Detalle de Ingreso') //Form
            ->setEntityLabelInPlural('Detalles de Ingreso') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('cantidad')
                ->setTextAlign('center')
            ,
            NumberField::new('precioven_mayor','Precio por Mayor')
                ->setTextAlign('center')
            ,
            NumberField::new('precioven_minimo_mayor','Precio (Min) por Mayor')
                ->setTextAlign('center')
            ,
            NumberField::new('precioven_menor','Precio por Menor')
                ->setTextAlign('center')
            ,
            NumberField::new('precioven_minimo_menor','Precio (Min) por Menor')
                ->setTextAlign('center')
            ,
            NumberField::new('precio_compra','Precio de Compra')
                ->setTextAlign('center')
            ,
            AssociationField::new('articulo')
                ->setTextAlign('center')
            ,
            AssociationField::new('ingreso')
                ->setTextAlign('center')
            ,
        ];
    }
}
