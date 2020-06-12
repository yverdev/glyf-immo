<?php
namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/register.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/user/{id<\d+>}", name="user")
     * @Route("/profile", name="profile")
     */
    public function detail(User $user = null)
    {
        if($user === null){
            $user = $this->getUser();
        }
        // on redirige vers la page d'accueil si problème avec l'utilisateur
        if($user === null){
            return $this->redirectToRoute('home');
        }

        return $this->render('user/detail.html.twig', [
            'user' => $user,
        ]);
    }
}