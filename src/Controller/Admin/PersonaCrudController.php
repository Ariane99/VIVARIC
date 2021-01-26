<?php

namespace App\Controller\Admin;

use App\Entity\Persona;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PasswordField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PersonaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Persona::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre'),
            TextField::new('email'),
            TextField::new('ci'),
            TextField::new('direccion'),
            TextField::new('roles'),
            PasswordField::new('password'),
        ];
        
    }
}
