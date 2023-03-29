<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route({
     *      "en": "/contact",
     *      "fr": "/contact"     
     * }
     * , name="contact")
     */
    public function index(): Response
    {
        $form = $this->createForm(ContactType::class);


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
