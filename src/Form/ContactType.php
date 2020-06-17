<?php

namespace App\Form;

use App\Entity\Contact;
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
                'attr' => [
                    'placeholder' => 'Si vous souhaitez vous renseigner sur un bien particulier, merci de préciser sa référence.'
                ]
            ])
            ->add('property')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}
