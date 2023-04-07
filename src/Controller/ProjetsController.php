<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    /**
     * @Route({
     *      "en": "/projects",
     *      "fr": "/projets"     
     * }
     * , name="projets")
     */
    public function index(): Response
    {
        return $this->render('projets/index.html.twig', [
            'controller_name' => 'ProjetsController',
        ]);
    }


    /**
     * @Route({
     *      "en": "/projects/evolution-fit",
     *      "fr": "/projets/evolution-fit"     
     * }
     * , name="projets_details")
     */
    public function detailsProjects(): Response
    {
        return $this->render('projets/details.html.twig', [
        ]);
    }
}
