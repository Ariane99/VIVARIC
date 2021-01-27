<?php

namespace App\Controller\Admin;

use App\Entity\Proveedores;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProveedoresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Proveedores::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre_prov', 'Nombre Proveedor'),
            TextField::new('email_prov', 'Email'),
            TextField::new('ci_prov', 'Ci'),
            TextField::new('direccion_prov','Direccion'),
            TextField::new('telefono_prov', 'Telefono'),
        ];
    }
}
