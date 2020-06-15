<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\SearchFormType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Algolia\SearchBundle\SearchService;

class SearchController extends AbstractController
{

    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * @Route("/search", name="searchBar")
     */

    public function search(Request $request, PropertyRepository $propertyRepository)
    {

        $form = $this->createForm(SearchFormType::class);

        if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $criteria = $form->getData();
            dd($criteria);
        }
        return $this->render('search/search.html.twig', [
            'searchForm' => $form->createView()

        ]);



        $em = $this->getDoctrine()->getManagerForClass(Property::class);
        $properties = $this->searchService->search($em,Property::class, '4');
//        dd($properties);
        return $this->render('search/search.html.twig', [
            'search' => $properties
        ]);
    }
}

