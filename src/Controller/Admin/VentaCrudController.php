<?php

namespace App\Controller\Admin;

use App\Entity\Venta;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Venta::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('tipo_comprobante','Tipo de Comprobante'),
            TextField::new('serie_comprobante','Serie de Comprobante'),
            TextField::new('num_comprobante','N° de Comprobante'),
            DateField::new('fecha_hora','Fecha y Hora'),
            NumberField::new('impuesto'),
            TextField::new('estado'),
            NumberField::new('total_venta','Total de Venta'),
            AssociationField::new('persona'),
        ];
    }
}
