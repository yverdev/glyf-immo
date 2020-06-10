<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
{
    const NB_PROPERTY = 50;

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < self::NB_PROPERTY; $i++){
            $property = new Property();

            $property->setTitle("Appartement $i")
                ->setAdress("$i Avenue de ma super maison")
                ->setCity("Paris")
                ->setPostalCode(random_int(75000, 75020))
                ->setDescription("Ma super description $i")
                ->setPrice(random_int(10000, 1000000))
                ->setNumberOfBedrooms(random_int(1, 5))
                ->setHeater(true)
                ->setRef(random_int(100, 50000))
                ->setSurface(random_int(18, 400));

            $manager->persist($property);
        }

        $manager->flush();
    }
}
