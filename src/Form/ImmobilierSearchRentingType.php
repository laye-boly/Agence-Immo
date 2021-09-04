<?php

namespace App\Form;
use App\Entity\ImmobilierSearchRenting;
use App\Entity\Fonctionnalite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmobilierSearchRentingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurfaceRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('maxPriceRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prix maximal'
                ]
            ])

            ->add('fonctionnalitesRenting', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Fonctionnalite::class,
                'choice_label' => 'fonctionnalite',
                'multiple' => true
            ])
            ->add('addressRenting', null, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Adresse'
                ]
            ])
           

            ->add('nbreDeChambresRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de chambres'
                ]
            ])

            ->add('nbreDeSallesDeBainRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de salles de bain'
                ]
            ])

            ->add('nbreDeEtagesRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de salles d'étages"
                ]
            ])
            ->add('nbreDeCuisinesRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de cuisines"
                ]
            ])

            ->add('nbreDeSalonsRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de salons"
                ]
            ])

            ->add('nbreDeGaragesRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de garages"
                ]
            ])

            ->add('nbreDePiscinesRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de piscines"
                ]
            ])

            ->add('nbreDeJardinsRenting', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de jardins'
                ]
            ])

            ->add('activeRenting', TextType::class, [

                'label' => false
                
            ])
            
            
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImmobilierSearchRenting::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
