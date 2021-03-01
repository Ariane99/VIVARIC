<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Persona;
use App\Form\PersonaType;
use Symfony\Component\HttpFoundation\Request;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\RolField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PasswordField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PersonaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Persona::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Usuario");
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
            ->setEntityLabelInSingular('Persona') //Form
            ->setEntityLabelInPlural('Persona/Usuario') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //FormField::addPanel('Persona')->setFormType(PersonaType::class),
            TextField::new('nombre','Nombre')
                ->setTextAlign('center')
            ,
            EmailField::new('email','Email')
                ->setTextAlign('center')
            ,
            TextField::new('ci','Ci')
                ->setTextAlign('center')
            ,
            TelephoneField::new('telefono','Telefono')
                ->setTextAlign('center')
            ,
            TextField::new('direccion','Direccion')
                ->setTextAlign('center')
            ,
            ArrayField::new('roles','Rol')
                ->hideOnForm()
                ->setTextAlign('center')
            ,
            PasswordField::new('password', 'Contraseña')
                ->setTextAlign('center')
                ->onlyOnForms()
            ,
        ];
    }
}
