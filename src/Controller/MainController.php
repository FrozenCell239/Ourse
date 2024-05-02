<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/about_us', name: 'app_about_us')]
    public function about_us(): Response
    {
        return $this->render('main/about_us.html.twig');
    }

    #[Route('/map', name: 'app_map')]
    public function map(): Response
    {
        return $this->render('main/map.html.twig');
    }

    #[Route('/private_individual_info', name: 'app_private_individual_info')]
    public function private_individual_info(): Response
    {
        return $this->render('main/private_individual_info.html.twig');
    }

    #[Route('/professionnal_info', name: 'app_professionnal_info')]
    public function professionnal_info(): Response
    {
        return $this->render('main/professionnal_info.html.twig');
    }
};