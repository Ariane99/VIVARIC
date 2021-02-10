<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PersonaType extends AbstractType
{
    /**
     * @var UserPasswordEncoderInterface
     */
    public $encoder;

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', PasswordType::class)
        ;

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event/*, UserPasswordEncoderInterface  $encoder*/) {
            $user = new Persona();
            //$pass = $event->getData();
            $form = $event->getForm();


            // $form = $this->createForm(UserType::class,$user);
            //
            $user->setPassword($this->$encoder->encodePassword( $user, $form['password']->getData() ));
            //eso si no te mentire, lo que estabas armando, no entendi mucho, demasiada personalidad para easyadmin
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persona::class,
        ]);
    }


}
