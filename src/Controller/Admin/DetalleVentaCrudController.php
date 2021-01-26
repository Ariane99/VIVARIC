<?php

namespace App\Controller\Admin;

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

    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('precio_venta','Precio de Venta'),
            IntegerField::new('cantidad'),
            AssociationField::new('venta'),
            AssociationField::new('articulo'),
        ];
    }
}
