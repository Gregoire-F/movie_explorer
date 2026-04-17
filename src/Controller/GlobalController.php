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
        $films = [
            'Les visiteurs 1, 1993',
            'Tais-toi, 2006',
            'Django Unchained, 2012'
        ];
        return $this->render('liste.html.twig', ['titre' => 'Liste des films', 'films' => $films]);
    }

    #[Route('/film/{id}', name: 'app_film_id')]
    public function filmId(int $id): Response

    {
        return new Response('Film n°' . $id);
    }

    #[Route('api/films/', name: 'app_film')]
    public function apiFilms(): Response
    {
        $films = [
            ['id' => 1, 'titre' => 'Les visiteurs 1', 'annee' => 1993],
            ['id' => 2, 'titre' => 'Tais-toi', 'annee' => 2006],
            ['id' => 3, 'titre' => 'Django Unchained', 'annee' => 2012]
        ];
        return $this->render('films.html.twig', ['films' => $films]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }
}
