<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $data = $form->getData();
            $email = new TemplatedEmail();
            $email->from($data['name'] . ' ' . $data['email'] . ' <' . $data['email'] . '>')
                ->to('gardienadrien@gmail.com') /* Ne marche pas */
                ->replyTo($data['email'])
                ->subject('contact depuis le site ARCoaching')
                ->htmlTemplate('emails_template/contact.html.twig') 
                ->context([
                    'fromEmail' => $data['email'],
                    'message' => nl2br($data['email']),
                    'tel' => ($data['phone'])
                ]);
                $mailer->send($email);
                return $this->redirectToRoute('app_home');
        }
        
        return $this->render('home/index.html.twig', [
            'formContact' => $form->createView(),
        ]);
    }




}
