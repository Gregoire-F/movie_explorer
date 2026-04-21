<?php

namespace App\Controller;

use App\Repository\SoireeRepository;
use App\Repository\MaterielRepository;
use App\Repository\ThemeRepository;
use App\Repository\ArtisteRepository;
use App\Repository\MaterielSoireeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Response;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
final class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'app_admin_dashboard')]
    public function dashboard(
        SoireeRepository $soireeRepository,
        MaterielRepository $materielRepository,
        ThemeRepository $themeRepository,
        ArtisteRepository $artisteRepository,
        MaterielSoireeRepository $materielSoireeRepository
    ): Response {
        return $this->render('admin/dashboard.html.twig', [
            'soirees' => $soireeRepository->findAll(),
            'materiels' => $materielRepository->findAll(),
            'themes' => $themeRepository->findAll(),
            'artistes' => $artisteRepository->findAll(),
            'materielSoirees' => $materielSoireeRepository->findAll(),
        ]);
    }
}
