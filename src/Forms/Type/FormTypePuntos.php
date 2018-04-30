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

class FormTypePuntos extends AbstractType{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ('nombre', TextType::class,array(
                'attr' => array(
                    'id' => '_nombre',
                    'name' => '_nombre'
                )
            ))

            ->add ('direccion', TextType::class,array(
                'attr' => array(
                    'id' => '_direccion',
                    'name' => '_direccion'
                )
            ))
            ->add ('telefono', TextType::class,array(
                'attr' => array(
                    'id' => '_telefono',
                    'name' => '_telefono'
                )
            ))

//            Botón Guardar
            ->add ('btnGuardar', SubmitType::class, array(
                'attr' => array(
                    'id' => '_btnGuardar',
                    'name' => '_btnGuardar'
                ), 'label' => 'GUARDAR'
            ))
        ;
    }
}