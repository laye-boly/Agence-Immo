<?php

namespace App\Form;
use App\Entity\ImmobilierSearchSelling;
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

class ImmobilierSearchSellingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prix maximal'
                ]
            ])

            ->add('fonctionnalites', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Fonctionnalite::class,
                'choice_label' => 'fonctionnalite',
                'multiple' => true
            ])
            ->add('address', null, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Adresse'
                ]
            ])
           

            ->add('nbreDeChambres', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de chambres'
                ]
            ])

            ->add('nbreDeSallesDeBain', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de salles de bain'
                ]
            ])

            ->add('nbreDeEtages', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de salles d'étages"
                ]
            ])
            ->add('nbreDeCuisines', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de cuisines"
                ]
            ])

            ->add('nbreDeSalons', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de salons"
                ]
            ])

            ->add('nbreDeGarages', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de garages"
                ]
            ])

            ->add('nbreDePiscines', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    "placeholder" => "nombre de piscines"
                ]
            ])

            ->add('nbreDeJardins', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'nombre de jardins'
                ]
            ])

            ->add('active', TextType::class, [

                'label' => false
                
            ])
            
            
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImmobilierSearchSelling::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
