<?php

namespace App\Controller;

use App\Entity\LigneDevisFournisseur;
use App\Form\LigneDevisFournisseurType;
use App\Repository\LigneDevisFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/devis/fournisseur')]
class LigneDevisFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_ligne_devis_fournisseur_index', methods: ['GET'])]
    public function index(LigneDevisFournisseurRepository $ligneDevisFournisseurRepository): Response
    {
        return $this->render('ligne_devis_fournisseur/index.html.twig', [
            'ligne_devis_fournisseurs' => $ligneDevisFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_devis_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneDevisFournisseur = new LigneDevisFournisseur();
        $form = $this->createForm(LigneDevisFournisseurType::class, $ligneDevisFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneDevisFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_fournisseur/new.html.twig', [
            'ligne_devis_fournisseur' => $ligneDevisFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_fournisseur_show', methods: ['GET'])]
    public function show(LigneDevisFournisseur $ligneDevisFournisseur): Response
    {
        return $this->render('ligne_devis_fournisseur/show.html.twig', [
            'ligne_devis_fournisseur' => $ligneDevisFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_devis_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneDevisFournisseur $ligneDevisFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneDevisFournisseurType::class, $ligneDevisFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_fournisseur/edit.html.twig', [
            'ligne_devis_fournisseur' => $ligneDevisFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, LigneDevisFournisseur $ligneDevisFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDevisFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneDevisFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_devis_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
