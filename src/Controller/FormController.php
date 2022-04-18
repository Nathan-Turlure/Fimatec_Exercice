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

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            return $this->redirectToRoute('app_formFormations', [ 
            'Nom'=> $form->get('Nom')->getData(),
            'Prenom'=> $form->get('Prenom')->getData(),
            'Adresse'=> $form->get('Adresse')->getData(),
            'Date_Naissance'=> $form->get('Date_Naissance')->getData(),
        
            ]);
        }
        
        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }


    #[Route('/formFormations', name: 'app_formFormations')]
    public function formations(Request $request, MailerInterface $mailer ): Response
    {
        $form2 = $this->createForm(FormationType::class);
        $dateOfBirth = date($_GET["Date_Naissance"]);
        $today = date("d-m-Y");
        
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $days = $diff->days;
        $age = round($days /365);

        if($request->isMethod('POST')){
            $form2->handleRequest($request);
            
            return $this->redirectToRoute('app_form');
        }
        
        return $this->render('form/formations.html.twig', [
            'form2' => $form2->createView(),
            'Nom' => $_GET["Nom"],
            'Prenom' => $_GET["Prenom"],
            'Adresse' => $_GET["Adresse"],
            'Date_Naissance' => $_GET["Date_Naissance"],
            'Age' => $age,
        ]);
    }

}
