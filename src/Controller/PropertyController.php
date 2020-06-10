<?php

namespace App\Controller;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property")
     */
    public function index(PropertyRepository $propertyRepository)
    {
        $properties = $propertyRepository->findAll();
        return $this->render('property/propertyList.html.twig', [
            'properties' => $properties,
        ]);
    }

    /**
     * @Route("/property/{id}", name="detailProperty")
     */
    public function show(Property $property)
    {

        return $this->render('property/propertyDetail.html.twig', [
            'property' => $property,
        ]);
    }

}
