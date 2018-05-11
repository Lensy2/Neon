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

class FormTypeCliente extends AbstractType{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ('nit', TextType::class,array(
                'attr' => array(
                    'id' => '_nit',
                    'name' => '_nit'
                )
            ))

            ->add ('nombre', TextType::class,array(
                'attr' => array(
                    'id' => '_nombre',
                    'name' => '_nombre'
                )
            ))
            ->add ('telefono', TextType::class,array(
                'attr' => array(
                    'id' => '_telefono',
                    'name' => '_telefono'
                )
            ))
            ->add ('email', TextType::class,array(
                'attr' => array(
                    'id' => '_email',
                    'name' => '_email'
                )
            ))

            ->add ('btnGuardar', SubmitType::class, array(
                'attr' => array(
                    'id' => '_btnGuardar',
                    'name' => '_btnGuardar',
                ), 'label' => 'GUARDAR'
            ))
        ;
    }
    public function getBlockPrefix()
    {
        return 'form';
    }
}