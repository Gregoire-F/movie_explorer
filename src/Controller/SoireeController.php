<?php

namespace App\Controller;

use App\Entity\Soiree;
use App\Form\SoireeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SoireeController extends AbstractController
{
    #[Route('/soiree', name: 'app_soiree')]
    public function index(): Response
    {
        return $this->render('soiree/index.html.twig', [
            'controller_name' => 'SoireeController',
        ]);
    }

    // #[Route('/soiree/creer', name: 'creer_soiree')]
    // public function creerSoiree(EntityManagerInterface $em): Response
    // {
    //     $soiree = new Soiree();
    //     $soiree->setTitre("Soirée mousse");
    //     $soiree->setDateSoiree(new \DateTimeImmutable);
    //     $soiree->setDateCreation(new \DateTimeImmutable);
    //     $em->persist($soiree);
    //     $em->flush();
    //     return new Response("Soirée créé avec l'ID : " . $soiree->getId());
    // }

#[Route('/soiree/creer', name: 'creer_soiree')]
function creerSoiree(EntityManagerInterface $em, Request $request): Response
{
    $soiree = new Soiree();
    $soiree->setDateCreation(new \DateTimeImmutable()); 

    $form = $this->createForm(SoireeType::class, $soiree);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($soiree);
        $em->flush();
        return $this->redirectToRoute('app_soiree');
    }

    return $this->render('soiree/creer.html.twig', [
        'form' => $form->createView(),
    ]);
}

    #[Route('/soiree/{id}', name: 'show_soiree')]
    function showSoiree(Soiree $soiree): Response
    {
        dd($soiree);
    }

    #[Route('/soiree/{id}/update', name: 'update_soiree')]
    function update_soiree(EntityManagerInterface $em, int $id)
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $soiree->setTitre("nouveau nom de soiree $id");
        $em->flush();
        dd($soiree);
    }

    #[Route('/soiree/{id}/delete', name: 'delete_soiree')]
    function delete_soiree(EntityManagerInterface $em, int $id)
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $em->remove($soiree);
        $em->flush();
        // return $this->redirectToRoute('soirees');
    }
}
