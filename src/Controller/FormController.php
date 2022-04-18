<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Form\FormationType;
use App\Form\UserType;



class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserType::class);
        
        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }


}
