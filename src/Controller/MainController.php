<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    // /**
    //  * @Route("/", name="home")
    //  */
    // public function index(): Response
    // {

    //     return $this->render('main/home.html.twig', [
    //     ]);
    // }

    /**
     * @Route(
     * {
     *      "en": "/home",
     *      "fr": "/accueil"     
     * }, name="home")
     */
    public function home(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            // dd($form->getData());
           $em->persist($contact);
           $em->flush();

           $this->addFlash('success', 'Votre message a bien été envoyé');

            return $this->redirectToRoute('home');
        }

        return $this->render('main/home.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}
