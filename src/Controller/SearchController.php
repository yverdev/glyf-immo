<?php

namespace App\Controller;

use App\Form\SearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function searchProperty(Request $request)
    {
        $form = $this->createForm(SearchFormType::class);
        //dd($form);
        return $this->render('search/index.html.twig', [
            'search_form' => $form->createView(),
        ]);
    }
}
