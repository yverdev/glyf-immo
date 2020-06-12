<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    public function search()
    {
        $em = $this->getDoctrine()->getManagerForClass(Property::class);
        $properties = $this->searchService->search($em,Property::class, '4');
        //dd($properties);
        return $this->render('search/search.html.twig', [
            'search' => $properties
        ]);
    }
}

