<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Ingreso;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IngresoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingreso::class;
    }
    
    //AGREGAR COLUMNAS
    public function configureActions(Actions $actions): Actions
    {
        return $actions

            //Agregamos Detail (Ver detalle) de index
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Ingreso");
            })

            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fas fa-pen-square')->setLabel(" Editar");
            })
            
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fas fa-eraser')->setLabel(" Eliminar");
            })

            //Actualizamos la funcion con un Icono
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa fa-file-alt')->setLabel(" Ver Detalle");
            })
        ;
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
            TextField::new('tipo_comprobante','Tipo de Comprobante'),
            TextField::new('serie_comprobante','Serie de Comprobante'),
            TextField::new('num_comprobante','N° de Comprobante'),
            DateTimeField::new('fecha_hora','Fecha y Hora')->setFormat('M/d/yy H:mm'), //formato para vista
            NumberField::new('impuesto'),
            TextField::new('estado'),
            AssociationField::new('persona'),
        ];
    }

}
