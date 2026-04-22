<?php

namespace App\Controller;

use App\Repository\MaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/materiel', name: 'app_api_materiel')]
    public function materiel(MaterielRepository $materielRepository): Response
    {
        $materiel = $materielRepository->findAll();
        return $this->json($materiel, 200, [], ['groups' => 'materiel:read']);
    }
}
