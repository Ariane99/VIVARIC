<?php

namespace App\Controller\Admin;

////////////PRUEBA
use App\Entity\Venta;
use App\Entity\Articulo;
use App\Entity\DetalleVenta;
////////////


use App\Form\DetalleVentaType;
use App\Service\MessageService;
use Symfony\Component\Form\FormEvent;
use App\Repository\ArticuloRepository;

use Doctrine\ORM\EntityManagerInterface;
/////
use App\Repository\DetalleVentaRepository;
use Symfony\Component\String\UnicodeString;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Routing\Annotation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VentaCrudController extends AbstractCrudController
{
    
    protected $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }
    
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

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        
        parent::persistEntity($entityManager,$entityInstance);


       /* $dt = new DetalleVenta();

        $form = $this->createForm(DetalleVentaType::class, $dt); 


        $em=$this->getDoctrine()->getManager();
        $form->$this->getData();

        $articulo = $form['articulo']->getData();
        $venta->$form['cantidad']->getData();*/
        
       // $cantidadArticulo = json_encode($this->getDoctrine()->getRepository('App\Entity\Articulo')->getArticulo($articulo));
        
        //$this->messageService->addSuccess( $cantidadArticulo);
        /*   if(($catidadVenta - $cantidadArticulo) < 4 )
        {
            $this->messageService->addSuccess('holi'); //mandas el tipo de mensaje (error o success), y el mensaje
        } */
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
                ->setFormat('M/d/yy H:mm')
                ->setTextAlign('center')
            ,
            NumberField::new('impuesto')
                ->setTextAlign('center')
            ,
            ChoiceField::new('estado','Estado')
                ->setTextAlign('center')
                ->setChoices(array('Cancelado'=>'Cancelado', 'Pendiente'=>'Pendiente'))
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
                ->hideOnIndex()
                ->allowAdd() 
                ->allowDelete()
                ->setEntryIsComplex(true)
                ->setEntryType(DetalleVentaType::class)
                ->setFormTypeOptions([
                    'by_reference' => 'false'
                ])
            ,
            //////////////////////////////////////////
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
            ->add(TextFilter::new('serie_comprobante'))
            ->add(EntityFilter::new('detalleventa'))
        ;
    }
    
}
