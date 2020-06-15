<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/register", name="app_register")
     * @Route("/register/edit/{id<\d+>}", name="edit_user")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $objectManager, User $user = null): Response
    {
        if($user === null){
            $user = new User();
        }

        $form = $this->createForm(RegistrationFormType::class, $user, [
            'validation_groups' => [
                'Default',
                ($user->getId() ? "Edition" : "Ajout")
            ]
        ]);
        $form->add('submit', SubmitType::class,[
            'label' => ($user->getId() ? "Editer" : "Ajouter") . " votre profil"
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword($form->get('plainPassword')->getData());

//            $user->setRoles(['ROLE_USER']);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('contact@glyfimmo.com', 'Glyf Immo'))
                    ->to($user->getEmail())
                    ->subject('Veuillez confirmer votre email.')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            $objectManager->persist($user);
            $objectManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse email a été vérifiée.');

        return $this->redirectToRoute('app_register');
    }

    /**
     * @Route("/change/password", name="change_password")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     */

    public function changeUserPassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $form = $this->createForm(ChangePasswordType::class);

        $form->add('submit', SubmitType::class, [
            'label' => "Editer votre mot de passe"
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            # $old_password = $request->get('old_password');
            # $new_password = $request->get('new_password');

            $newpwd = $form->get('new_password')->getData();

            $newEncodedPassword = $passwordEncoder->encodePassword($user, $newpwd);
            $user->setPassword($newEncodedPassword);

            $entityManager->flush();
            $entityManager->persist($user);
            $this->addFlash('notice', 'Votre mot de passe a bien été changé !');

            return $this->redirectToRoute('profile');
        }

        return $this->render('registration/change_password.html.twig', [
            'changePasswordForm' => $form->createView(),
        ]);
    }
}
