<?php

namespace App\Forms\Type;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class FormTypeUsuario extends AbstractType{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,array(
                'attr' => array(
                    'id' => '_username',
                    'name' => '_username'
                )
            ))
            ->add ('nombre', TextType::class,array(
                'attr' => array(
                    'id' => '_nombre',
                    'name' => '_nombre'
                )
            ))
            ->add ('apellidos', TextType::class,array(
                'attr' => array(
                    'id' => '_apellidos',
                    'name' => '_apellidos'
                )
            ))
            ->add ('email', TextType::class,array(
                'attr' => array(
                    'id' => '_email',
                    'name' => '_email'
                )
            ))
            ->add('clave', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Las claves deben coincidir.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,

                'first_options'  => array('label' => 'Clave'),
                'second_options' => array('label' => 'Repita su clave'),
            ))

            ->add ('btnGuardar', SubmitType::class, array(
                'attr' => array(
                    'id' => '_btnGuardar',
                    'name' => '_btnGuardar'
                ), 'label' => 'GUARDAR'
            ))
        ;
    }
}