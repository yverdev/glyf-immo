<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,[
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email'
            ])
            ->add('phone', TelType::class,[
                'label' => 'Téléphone'
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Votre message',
            ])
        ;
        if (in_array('PropertyContact', $options['validation_groups'])) {
            $builder->add('property');
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
//            'PropertyContact' => Property::class
        ]);
//        $resolver->setAllowedTypes(
//            Property::class
//
//        );
    }
}
