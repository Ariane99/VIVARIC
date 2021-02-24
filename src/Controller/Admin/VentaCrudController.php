<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Venta;
use App\Form\DetVentaType;
use App\Entity\DetalleVenta;
use App\Form\DetalleVentaType;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Venta::class;
    }

    //AGREGAR COLUMNAS
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            //Agregamos Detail (Ver detalle) de index
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            
            //formato: Agregar a la vista, NUEVO, la funcion X.
            ->add(Crud::PAGE_NEW, Action::DETAIL)

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nueva Venta");
            })

            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fas fa-pen-square')->setLabel(" Editar");
            })
            
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fas fa-eraser')->setLabel(" Eliminar");
            })

            //ES ESTO BERTS, esta funcion por defectO
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
            ->setEntityLabelInSingular('Venta') //Form
            ->setEntityLabelInPlural('Ventas') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->setTextAlign('center')
            ,
            FormField::addPanel('Informacion Venta')
                ->setTextAlign('center')
            ,
            TextField::new('cicliente','CI Cliente')
                ->setTextAlign('center')
            ,
            TextField::new('nombrecliente','Nombre Cliente')
                ->setTextAlign('center')
            ,
            TextField::new('ciudad','Ciudad Cliente')
                ->setTextAlign('center')
            ,
            TextField::new('tipo_comprobante','Tipo de Comprobante')
                ->setTextAlign('center')
            ,
            TextField::new('serie_comprobante','Serie de Comprobante')
                ->setTextAlign('center')
            ,
            TextField::new('num_comprobante','N° de Comprobante')
                ->setTextAlign('center')
            ,
            DateTimeField::new('fecha_hora','Fecha y Hora')
                ->setFormat('M/d/yy H:mm')
                ->setTextAlign('center')
            ,
            NumberField::new('impuesto')
                ->setTextAlign('center')
            ,
            TextField::new('estado')
                ->setTextAlign('center')
            ,
            NumberField::new('total_venta','Total de Venta')
                ->setTextAlign('center')
            ,
            AssociationField::new('persona')
                ->setTextAlign('center')
            ,
            FormField::addPanel('Detalle Venta')
                ->setTextAlign('center')
            ,

            CollectionField::new('detalleventa', 'Detalle')
                ->setTextAlign('center')
                //->hideOnIndex()
                ->allowAdd() 
                ->allowDelete()
                ->setEntryIsComplex(true)
                ->setEntryType(DetalleVentaType::class)
                ->setFormTypeOptions([
                    'by_reference' => 'false'
                ])
            ,
        ];
    }
}
