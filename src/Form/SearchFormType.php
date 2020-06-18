<?php


namespace App\Form;


use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class SearchFormType extends AbstractType
{

    const PRICE = [10000, 30000, 50000, 100000, 150000, 200000, 300000, 400000, 1000000];
    const SURFACE = [20, 40, 60, 100, 200, 300, 600];
    const BEDROOMS = [2, 3, 4, 5];
    const ROOMS = [2, 3, 4, 5, 6, 7, 8];
    const TYPE = ['appartement', 'maison', 'terrain'];
    const BALC = [true,false];
    const FLOOR = [1, 2, 3, 4, 5, 6];
    const RENTALORSALE =['achat', 'location'];
    const HEATER = ['electrique', 'gaz', 'fioul'];
    const BOROUGH = [75000, 75001, 75002, 75003, 75004, 75005, 75006, 75007, 75008, 75009, 75010, 75011, 75012, 75013, 75014, 75015, 75016, 75017, 75018, 75019, 75020];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Type de biens',
                    'choices' => array_combine(self::TYPE, self::TYPE)
                ])
                ->add('rental', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Achat/Location',
                    'choices' => array_combine(self::RENTALORSALE, self::RENTALORSALE)
                ])
                    ->add('city', TextType::class, [
                   'required' => false,
                   'label' => false,
                   'attr' => [
                       'placeholder' => 'Votre ville'
                        ]
                    ])
                ->add('postalcode', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Code Postal',
                    'choices' => array_combine(self::BOROUGH, self::BOROUGH)
                ])
                ->add('price', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Bubget max',
                    'choices' => array_combine(self::PRICE, self::PRICE)
                ])

                ->add('surface', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Surface mini',
                    'choices' => array_combine(self::SURFACE, self::SURFACE)
                ])
                ->add('rooms', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Nbre de pièces',
                    'choices' => array_combine(self::ROOMS, self::ROOMS)
                ])
                ->add('bedrooms', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Nbre de chambres',
                    'choices' => array_combine(self::BEDROOMS, self::BEDROOMS)
                ])
                ->add('floor', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Etage',
                    'choices' => array_combine(self::FLOOR, self::FLOOR)
                ])
                ->add('balcony', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Balcon'
                ])
                ->add('garage', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Garage'
                ])
                ->add('parking', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Parking'
                ])
                ->add('garden', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Jardin'
                ])
                ->add('furnished', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Meublée'
                ])
                ->add('caretaker', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Concierge'
                ])
                ->add('handicapAcces', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Accès Handicapé'
                ])
                ->add('heat', CheckboxType::class,[
                    'required' => false,
                    'label' => 'Chauffage'
                ])
                ->add('heater', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Type de Chauffage',
                    'choices' => array_combine(self::HEATER, self::HEATER)
                ])
                ->add('ref', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Saisir la référence du bien'
                ]
                ])

                ->add('search', SubmitType::class, [
                    'label' => 'Rechercher'
                 ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => null]);

    }
}