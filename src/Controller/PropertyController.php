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
        return $this->render('property/search.html.twig', [
            'properties' => $properties,
        ]);
    }

    /**
     * @Route("/property/{slug}{id}", name="detailProperty", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show(Property $property, string $slug)
    {
        if($property->getSlug() !== $slug){
            return $this->redirectToRoute('detailProperty', [
               'id' => $property->getId(),
               'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/propertyDetail.html.twig', [
            'property' => $property,
        ]);
    }

}
