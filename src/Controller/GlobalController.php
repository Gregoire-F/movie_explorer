<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GlobalController extends AbstractController

{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('index.html.twig', ['titre' => 'Bienvenue sur Movie Explorer']);
    }

    #[Route('/liste', name: 'app_liste')]

    public function liste(): Response
    {
        return $this->render('liste.html.twig', ['titre' => 'Liste des films']);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }
}
