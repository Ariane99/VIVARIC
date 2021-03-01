<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Ingreso;
use App\Entity\DetalleIngreso;
use App\Form\DetalleIngresoType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
////////////

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
            
            //formato: Agregar a la vista, NUEVO, la funcion X.
            ->add(Crud::PAGE_NEW, Action::DETAIL)

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus-square')->setLabel(" Nuevo Ingreso");
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
            ->setEntityLabelInSingular('Ingreso Almacen') //Form
            ->setEntityLabelInPlural('Ingresos Almacen') //Index
        ;
    }

    public function configureFields(string $pageName): iterable
    {   
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm()
                ->hideOnDetail()
                ->setTextAlign('center')
            ,
            FormField::addPanel('Informacion Ingreso')
                ->setTextAlign('center')
            ,
            ChoiceField::new('tipo_comprobante','Tipo de Comprobante')
                ->setTextAlign('center')
                ->setChoices(array('Factura'=>'Factura', 'Boleta'=>'Boleta'))
            ,
            TextField::new('serie_comprobante','N° de RUT')
                ->setTextAlign('center')
            ,
            TextField::new('num_comprobante','N° de Comprobante')
                ->setTextAlign('center')
            ,
            DateTimeField::new('fecha_hora','Fecha y Hora')
                ->setFormat('M/d/yy H:mm')//formato para vista
                ->setTextAlign('center')
            , 
            NumberField::new('impuesto')
                ->setTextAlign('center')
            ,
            ChoiceField::new('estado','Estado')
            ->setTextAlign('center')
            ->setChoices(array('Cancelado'=>'Cancelado', 'Pendiente'=>'Pendiente'))
        ,
            AssociationField::new('persona','Persona')
                ->setTextAlign('center')
            ,
            AssociationField::new('proveedores','Proveedor')
                ->setTextAlign('center')
            ,
            FormField::addPanel('Detalle Ingreso')
                ->setTextAlign('center')
            ,
            
            CollectionField::new('detalleingreso', 'Detalle')
                ->setTextAlign('center')
                ->hideOnIndex()
                ->allowAdd() 
                ->allowDelete()
                ->setEntryIsComplex(true)
                ->setEntryType(DetalleIngresoType::class)
                ->setFormTypeOptions([
                    'by_reference' => 'false'
                ])
            ,
            TextField::new('total','TOTAL')
            ->hideOnForm()
            ->setTextAlign('center')
            ,
        ];
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // most of the times there is no need to define the
            // filter type because EasyAdmin can guess it automatically
            ->add(ChoiceFilter::new('estado')->setChoices(array('Cancelado'=>'Cancelado', 'Pendiente'=>'Pendiente')))
            ->add(ChoiceFilter::new('tipo_comprobante')->setChoices(array('Cancelado'=>'Cancelado', 'Pendiente'=>'Pendiente')))
            ->add('fecha_hora')
            ->add('persona')
            ->add('proveedores')
            ->add(EntityFilter::new('detalleingreso'))
        ;
    }
}
