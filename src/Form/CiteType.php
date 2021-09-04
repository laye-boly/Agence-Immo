<?php

namespace App\Form;

use App\Entity\Cite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\ImmobilierType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\MaisonType;

class CiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('immobilier', ImmobilierType::class, [
                'data_class' => Cite::class,
            ])
            ->add('maisons', CollectionType::class, [
                'entry_type'   => MaisonType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'label'        => 'Les types de maison'
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cite::class,
        ]);
    }
}
