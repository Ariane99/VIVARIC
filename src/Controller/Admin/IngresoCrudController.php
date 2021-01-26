<?php

namespace App\Controller\Admin;

use App\Entity\Ingreso;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IngresoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingreso::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('tipo_comprobante','Tipo de Comprobante'),
            TextField::new('serie_comprobante','Serie de Comprobante'),
            TextField::new('num_comprobante','N° de Comprobante'),
            DateTimeField::new('fecha_hora','Fecha y Hora'),
            NumberField::new('impuesto'),
            TextField::new('estado'),
            AssociationField::new('persona'),
        ];
    }
    
}
