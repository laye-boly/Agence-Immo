<?php

namespace App\Form;

use App\Entity\Immobilier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Fonctionnalite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ImmobilierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('description', TextareaType::class,[
            'label' => "Description de la cité"
            
        ])
        ->add('titre', TextType::class,[
            'label' => "Titre du bien immobilier"
           
        ])

        ->add('debutTravaux', TextType::class,[
            'label' => "Début des travaux"
            
        ])

        ->add('livraison', TextType::class,[
            'label' => "Fin des travaux"
            
        ])
        ->add('adresse', TextType::class,[
            'label' => "Adresse du bien immobiler"
            
        ])
        ->add('etat', ChoiceType::class, [
            'choices'  => [
                'Projet en cours' => "en_cours",
                'Projet à venir' => "a_venir",
                'Projet terminé' => "termine"
            ],
            'label' => "Etat du projet"
            ])
        
        ->add('pictureFiles', FileType::class, [
            'required' => false,
            'multiple' => true,
            'label' => 'illustrez le bien immobilier par des images'
        ])
        ->add('fonctionnalites', EntityType::class, [
            'class' => Fonctionnalite::class,
            'choice_label' => 'fonctionnalite',
            'multiple' => true,
            'expanded' => false,
            'label' => 'Quelles fonctionnalités accompagnent le bien immobilier ?',
            'required' => false
        ])

        ->add('avancements', CollectionType::class, [
            'entry_type'   => AvancementType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'label'        => 'Avancement du projet'
        ])

        ->add('submit', SubmitType::class,[
            'label' => "Ajouter"     
        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Immobilier::class,
            'inherit_data' => true
        ]);
    }
}
