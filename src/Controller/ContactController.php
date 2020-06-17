<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Property;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @Route("/contact/property/{ref}", name="property_contact")
     */
    public function contact(Request $request,\Swift_Mailer $mailer, Property $property = null)
    {
        $contact = new Contact();
        $groups = ['Default'];
        if($property != null){
            $contact->setProperty($property);
            $groups[] = 'PropertyContact';
        }

        $form = $this->createForm(ContactType::class, $contact,[
            'validation_groups' => $groups
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // On crée le message
            $message = (new \Swift_Message($contact->getFirstname()))
                // On attribue l'expéditeur
                ->setFrom($contact->getEmail())
                // On attribue le destinataire
                ->setTo('contact@glyfimmo.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            $mailer->send($message);

            $this->addFlash('send_mail_success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');
        }

        return $this->render('contact/register.html.twig',[
            'contactForm' => $form->createView()
        ]);
    }
}
