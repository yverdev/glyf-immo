<?php
namespace App\Controller;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;

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

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/user/delete/{id<\d+>}", name="delete_user")
     */

    public function deleteUser(EntityManagerInterface $objectManager, User $user, TokenStorageInterface $tokenStorage)
    {
        $tokenStorage->setToken();
        $objectManager->remove($user);
        $objectManager->flush();
        return $this->redirectToRoute('app_logout');
    }
}