<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref', TextType::class, [
                'label' => 'Référence'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'annonce'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('picture', TextType::class, [
                'label' => 'Image'
            ])
            ->add('price', TextType::class, [
                'label' => 'prix'
            ])
            ->add('surface', TextType::class, [
                'label' => 'Surface'
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('postal_code', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('number_of_parts', TextType::class, [
                'label' => 'Nombre de pièces'
            ])
            ->add('number_of_bedrooms', TextType::class, [
                'label' => 'Nombre de chambres'
            ])
            ->add('garage', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Garage'
            ])
            ->add('parking', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Parking'
            ])
            ->add('balcony', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Balcon'
            ])
            ->add('garden', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Jardin'
            ])
            ->add('floor', TextType::class, [
                'label' => 'Etage'
            ])
            ->add('locality', TextType::class, [
                'label' => 'Localité'
            ])
            ->add('rental', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Location'
            ])
            ->add('sale', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vente'
            ])
            ->add('apartment', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Appartement'
            ])
            ->add('house', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Maison'
            ])
            ->add('budget')
            ->add('furnished', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Meublé'
            ])
            ->add('opposite', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Vis à Vis'
            ])
            ->add('caretaker', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Concierge'
            ])
            ->add('handicap_access', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accès handicapé'
            ])
            ->add('heater', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Chauffage'

            ])
            ->add('recherche', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
