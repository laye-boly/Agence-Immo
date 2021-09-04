<?php

namespace App\Form;

use App\Entity\Cantine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class CantineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Le type de la cantine'
            ] )
            ->add('description', TextareaType::class, [
                'label' => 'Décvrivez la cantine'
            ] )
            ->add('surface', NumberType::class, [
                'label' => 'Quelle est la superficie de la cantine ?'
            ] )
           ->add('prix', NumberType::class, [
                'label' => 'Quelle est le prix de la cantine ?'
            ] )

            ->add('nbreTypeCantine', NumberType::class, [
                'label' => 'Quelle est le nombre de type de cette cantine ?'
            ] )
            ->add('nbreCantineAvendre', NumberType::class, [
                'label' => 'Quelle est le nombre à vendre de ce type de cantine ?'
            ] )
            ->add('nbreCantineALouer', NumberType::class, [
                'label' => 'Quelle est le nombre à louer de ce type de cantine ?'
            ] )



            ->add('pictureFiles', FileType::class, [
                'required' => false,
                'multiple' => true,
                'label' => 'Ajouter des images pour la cantine'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cantine::class,
        ]);
    }
}
