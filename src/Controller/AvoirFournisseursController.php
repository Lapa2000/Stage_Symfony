<?php

namespace App\Controller;

use App\Entity\AvoirFournisseurs;
use App\Form\AvoirFournisseursType;
use App\Repository\AvoirFournisseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/avoir/fournisseurs')]
class AvoirFournisseursController extends AbstractController
{
    #[Route('/', name: 'app_avoir_fournisseurs_index', methods: ['GET'])]
    public function index(AvoirFournisseursRepository $avoirFournisseursRepository): Response
    {
        return $this->render('avoir_fournisseurs/index.html.twig', [
            'avoir_fournisseurs' => $avoirFournisseursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_avoir_fournisseurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avoirFournisseur = new AvoirFournisseurs();
        $form = $this->createForm(AvoirFournisseursType::class, $avoirFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avoirFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_avoir_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avoir_fournisseurs/new.html.twig', [
            'avoir_fournisseur' => $avoirFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avoir_fournisseurs_show', methods: ['GET'])]
    public function show(AvoirFournisseurs $avoirFournisseur): Response
    {
        return $this->render('avoir_fournisseurs/show.html.twig', [
            'avoir_fournisseur' => $avoirFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_avoir_fournisseurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvoirFournisseurs $avoirFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvoirFournisseursType::class, $avoirFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_avoir_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avoir_fournisseurs/edit.html.twig', [
            'avoir_fournisseur' => $avoirFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avoir_fournisseurs_delete', methods: ['POST'])]
    public function delete(Request $request, AvoirFournisseurs $avoirFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avoirFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avoirFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_avoir_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
