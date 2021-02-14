<?php

namespace App\Form;

use App\Entity\DetalleIngreso;
use App\Entity\Ingreso;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DetalleIngresoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ingreso= new Ingreso();
        $builder
            //->add('Ingreso',SubmitType::Class)
            //->add('ingreso',HiddenType::Class)
            ->add('cantidad',IntegerType::Class)
            ->add('precioven_mayor',NumberType::Class)
            ->add('precioven_minimo_mayor',NumberType::Class)
            ->add('precioven_menor',NumberType::Class)
            ->add('precioven_minimo_menor',NumberType::Class)
            ->add('precio_compra',NumberType::Class)
            ->add('articulo')

            /*->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event) 
                {
                    $ingreso = new Ingreso();
                    $id = $event->getForm();
                    $id['ingreso']->setData($ingreso->getId());
                }
            )*/
            //->add('ingreso_id',IntegerType::Class)
            //->add('Guardar',SubmitType::class)
            ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\DetalleIngreso'
        ));
    }

}
