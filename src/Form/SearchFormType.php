<?php


namespace App\Form;


use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class SearchFormType extends AbstractType
{

    const PRICE = [10000, 30000, 50000, 52956, 100000, 100667, 150000, 200000, 300000, 400000, 1000000];
    const SURFACE = [20, 40, 60, 100, 200, 300, 600];
    const BEDROOMS = [2, 3, 4, 5];
    const TYPE = ['appartement', 'maison', 'terrain'];
    const BALC = [true,false];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('city', TextType::class, [
           'required' => false,
           'label' => false,
           'attr' => [
               'placeholder' => 'Votre ville'
           ]
        ])
                ->add('type', ChoiceType::class, [
            'required' => false,
            'label' => false,
            'placeholder' => 'Type de biens',
            'choices' => array_combine(self::TYPE, self::TYPE)

    ])
            ->add('price', ChoiceType::class, [
                'required' => false,
                'label' => false,
                'placeholder' => 'Bubget max',
                'choices' => array_combine(self::PRICE, self::PRICE)
            ])
            ->add('balcony', ChoiceType::class, [
                'required' => false,
                'label' => false,
                'placeholder' => 'Balcon',
                'choices' => array_combine(self::BALC, self::BALC)
            ])
            ->add('search', SubmitType::class, [
                'label' => 'Rechercher'
             ])
        ;
    }


}