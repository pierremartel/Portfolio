<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route(
     *      {
     *      "en": "/about",
     *      "fr": "/a-propos"     
     * }
     * , name="about")
     */
    public function index(): Response
    {
        return $this->render('about/profil.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
