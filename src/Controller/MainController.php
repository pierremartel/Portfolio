<?php

namespace App\Controller;

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
    public function home(): Response
    {
        

        return $this->render('main/home.html.twig', [
        ]);
    }



}
