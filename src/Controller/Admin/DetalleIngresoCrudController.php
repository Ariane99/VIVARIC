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
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('cantidad'),
            NumberField::new('precioven_mayor','Precio por Mayor'),
            NumberField::new('precioven_minimo_mayor','Precio (Min) por Mayor'),
            NumberField::new('precioven_menor','Precio por Menor'),
            NumberField::new('precioven_minimo_menor','Precio (Min) por Menor'),
            NumberField::new('precio_compra','Precio de Compra'),
            AssociationField::new('articulo'),
            AssociationField::new('ingreso'),
        ];
    }
}
