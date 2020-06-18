<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index(PropertyRepository $propertyRepository)
    {
        $lastProperty = $propertyRepository->findBy(
            ['type' => 'appartement'],
            ['ref' => 'ASC'],
//            3
        );
//        dd($lastProperty);
        return $this->render('home/index.html.twig', [
            'lastProperty' => $lastProperty,
        ]);
    }

    
    /**
     * @Route("/about", name="aboutUs")
     */

    public function aboutUs()
    {
        return $this->render('home/about.html.twig', [
           'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/data_protection", name="dataProtection")
     */

    public function dataProtection() {
        return $this->render('legal/data_protection.html.twig', [
           'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/legal_mention", name="legalMention")
     */
    public function legalMention() {
        return $this->render('legal/legal_mention.html.twig', [
           'controller_name' => 'HomeController',
        ]);
    }
}
