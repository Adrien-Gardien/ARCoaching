<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response /* On ajoute Request $request pour pouvoir récupérer les données du formulaire */
    {
        $form = $this->createForm(ContactType::class); /* On crée le formulaire */

        $form->handleRequest($request); /* Va chercher les données que l'user aura pu mettre dans $request*/

        if ($form->isSubmitted() && $form->isValid()) { /* */

        $data = $form->getData(); /* On récupère les données du formulaire */

        $address = $data['email']; /* On récupère l'adresse mail de l'user */
        $content = $data['content']; /* On récupère le contenu du message de l'user */
       
        
        $email = (new Email())
        ->from($address)
        ->to('arcoaching@gmail.com')
        ->subject('Demande de contact')
        ->text($content)
        ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        }



        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController', /* On envoie le formulaire à la vue */
            'formulaire' => $form /* On envoie le formulaire à la vue */
        ]);
    }
}
