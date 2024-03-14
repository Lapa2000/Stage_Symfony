<?php

namespace App\Controller;

use App\Entity\LigneFacturesFournisseurs;
use App\Form\LigneFacturesFournisseursType;
use App\Repository\LigneFacturesFournisseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/factures/fournisseurs')]
class LigneFacturesFournisseursController extends AbstractController
{
    #[Route('/', name: 'app_ligne_factures_fournisseurs_index', methods: ['GET'])]
    public function index(LigneFacturesFournisseursRepository $ligneFacturesFournisseursRepository): Response
    {
        return $this->render('ligne_factures_fournisseurs/index.html.twig', [
            'ligne_factures_fournisseurs' => $ligneFacturesFournisseursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_factures_fournisseurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFacturesFournisseur = new LigneFacturesFournisseurs();
        $form = $this->createForm(LigneFacturesFournisseursType::class, $ligneFacturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFacturesFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_fournisseurs/new.html.twig', [
            'ligne_factures_fournisseur' => $ligneFacturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_fournisseurs_show', methods: ['GET'])]
    public function show(LigneFacturesFournisseurs $ligneFacturesFournisseur): Response
    {
        return $this->render('ligne_factures_fournisseurs/show.html.twig', [
            'ligne_factures_fournisseur' => $ligneFacturesFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_factures_fournisseurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFacturesFournisseurs $ligneFacturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFacturesFournisseursType::class, $ligneFacturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_fournisseurs/edit.html.twig', [
            'ligne_factures_fournisseur' => $ligneFacturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_fournisseurs_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFacturesFournisseurs $ligneFacturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFacturesFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneFacturesFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
