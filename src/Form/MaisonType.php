<?php

namespace App\Form;

use App\Entity\Maison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Le type de la maison'
            ] )
            ->add('description', TextareaType::class, [
                'label' => 'Décvrivez la maison'
            ] )
            ->add('surface', NumberType::class, [
                'label' => 'Quelle est la superficie de la maison'
            ] )
            ->add('chambres', NumberType::class, [
                'label' => 'Le nombre de pièces de la maison'
            ] )
            ->add('sallesDeBain', NumberType::class, [
                'label' => 'Le nombre de salles de bain de la maison'
            ] )
            ->add('etages', NumberType::class, [
                'label' => "Le nombre d'étages de la maison"
            ] )
            ->add('prix', NumberType::class, [
                'label' => 'Le prix de la maison'
            ] )
            ->add('cuisines', NumberType::class, [
                'label' => 'Le nombre de cuisines de la maison'
            ] )
            ->add('salons', NumberType::class, [
                'label' => 'Le nombre de salons de la maison'
            ] )
            ->add('garages', NumberType::class, [
                'label' => 'Le nombre de garages de la maison'
            ] )
            ->add('piscines', NumberType::class, [
                'label' => 'Le nombre de piscines de la maison'
            ] )
            ->add('jardins', NumberType::class, [
                'label' => 'Le nombre de jardins de la maison'
            ] )
            ->add('nbreTypeMaison', NumberType::class, [
                'label' => 'Le nombre de maisons de ce type'
            ] )
            ->add('nbreMaisonALouer', NumberType::class, [
                'label' => 'Le nombre de maisons de ce type à louer'
            ] )
            ->add('nbreMaisonAVendre', NumberType::class, [
                'label' => 'Le nombre de maisons de ce type à vendre'
            ] )
            ->add('pictureFiles', FileType::class, [
                'required' => false,
                'multiple' => true,
                'label' => 'Ajouter des images pour votre maison'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maison::class,
        ]);
    }
}
