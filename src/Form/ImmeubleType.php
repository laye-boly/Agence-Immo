<?php

namespace App\Form;

use App\Entity\Immeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Immobilier;
use App\Form\ImmobilierType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ImmeubleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('immobilier', ImmobilierType::class, [
                'data_class' => Immeuble::class,
            ])
            ->add('appartements', CollectionType::class, [
                'entry_type'   => AppartementType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'label'        => 'Les types d"appartements'
            ])

            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Immeuble::class,
        ]);
    }
}
