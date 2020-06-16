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

            $property->setTitle("appartement")
                ->setType("appartement")
                ->setAdress("$i avenue de ma super maison")
                ->setCity("paris")
                ->setPostalCode(random_int(75000, 75020))
                ->setDescription("ma super description $i")
                ->setPrice(random_int(10000, 1000000))
                ->setBedrooms(random_int(1, 5))
                ->setHeater(true)
                ->setRef(random_int(100, 50000))
                ->setSurface(random_int(18, 400))
                ->setBedrooms(random_int(1, 4))
                ->setFloor(random_int(1, 5))
                ->setRooms(random_int(2, 5))
                ->setSale(true)
                ->setPicture("http://placehold.it/250x200");

            $manager->persist($property);
        }

        $manager->flush();
    }
}
