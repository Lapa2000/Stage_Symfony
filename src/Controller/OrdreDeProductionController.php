<?php

namespace App\Controller;

use App\Entity\OrdreDeProduction;
use App\Form\OrdreDeProductionType;
use App\Repository\OrdreDeProductionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ordre/de/production')]
class OrdreDeProductionController extends AbstractController
{
    #[Route('/', name: 'app_ordre_de_production_index', methods: ['GET'])]
    public function index(OrdreDeProductionRepository $ordreDeProductionRepository): Response
    {
        return $this->render('ordre_de_production/index.html.twig', [
            'ordre_de_productions' => $ordreDeProductionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ordre_de_production_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordreDeProduction = new OrdreDeProduction();
        $form = $this->createForm(OrdreDeProductionType::class, $ordreDeProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ordreDeProduction);
            $entityManager->flush();

            return $this->redirectToRoute('app_ordre_de_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ordre_de_production/new.html.twig', [
            'ordre_de_production' => $ordreDeProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ordre_de_production_show', methods: ['GET'])]
    public function show(OrdreDeProduction $ordreDeProduction): Response
    {
        return $this->render('ordre_de_production/show.html.twig', [
            'ordre_de_production' => $ordreDeProduction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ordre_de_production_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrdreDeProduction $ordreDeProduction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrdreDeProductionType::class, $ordreDeProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ordre_de_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ordre_de_production/edit.html.twig', [
            'ordre_de_production' => $ordreDeProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ordre_de_production_delete', methods: ['POST'])]
    public function delete(Request $request, OrdreDeProduction $ordreDeProduction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordreDeProduction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ordreDeProduction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ordre_de_production_index', [], Response::HTTP_SEE_OTHER);
    }
}
