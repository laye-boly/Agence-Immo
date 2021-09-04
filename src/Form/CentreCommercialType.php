<?php

namespace App\Form;

use App\Entity\CentreCommercial;
use App\Form\CantineType;
use App\Form\ImmobilierType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CentreCommercialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('immobilier', ImmobilierType::class, [
                'data_class' => CentreCommercial::class,
            ])
            ->add('cantines', CollectionType::class, [
                'entry_type'   => CantineType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'label'        => 'Les types de cantines'
            ])
            ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CentreCommercial::class,
        ]);
    }
}
