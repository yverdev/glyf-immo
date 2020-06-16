<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\SearchFormType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\CallbackTransformer;
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
        $criteria = [];
        $form = $this->createForm(SearchFormType::class);

        if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $criteria = $form->getData();
        //dd($criteria);
        }

        $algoliaFilter = [];
        foreach ($criteria as $k => $v) {
            if(!$v){
                continue;
            }
            if($k == 'price' ){
                $v = intval($v);
                $op = "<";
            }else{
                $v = "\"$v\"";
                $op = ":";
            }
            $algoliaFilter[] = "$k$op$v";
        }
        $resultFilter = implode(' AND ', $algoliaFilter);
        //dd($resultFilter);
        $em = $this->getDoctrine()->getManagerForClass(Property::class);
        $properties = $this->searchService->search($em,Property::class, '', [
            'page' => 1,
            'hitsPerPage' => 3,
            'filters' => $resultFilter
        ]);
        //dd($properties);
        return $this->render('search/search.html.twig', [
            'results' => $properties,
            'searchForm' => $form->createView()

        ]);
    }

}

