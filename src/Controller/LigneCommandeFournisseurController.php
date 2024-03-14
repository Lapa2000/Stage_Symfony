<?php

namespace App\Controller;

use App\Entity\LigneCommandeFournisseur;
use App\Form\LigneCommandeFournisseurType;
use App\Repository\LigneCommandeFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/commande/fournisseur')]
class LigneCommandeFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_ligne_commande_fournisseur_index', methods: ['GET'])]
    public function index(LigneCommandeFournisseurRepository $ligneCommandeFournisseurRepository): Response
    {
        return $this->render('ligne_commande_fournisseur/index.html.twig', [
            'ligne_commande_fournisseurs' => $ligneCommandeFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_commande_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneCommandeFournisseur = new LigneCommandeFournisseur();
        $form = $this->createForm(LigneCommandeFournisseurType::class, $ligneCommandeFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneCommandeFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_fournisseur/new.html.twig', [
            'ligne_commande_fournisseur' => $ligneCommandeFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_fournisseur_show', methods: ['GET'])]
    public function show(LigneCommandeFournisseur $ligneCommandeFournisseur): Response
    {
        return $this->render('ligne_commande_fournisseur/show.html.twig', [
            'ligne_commande_fournisseur' => $ligneCommandeFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_commande_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneCommandeFournisseur $ligneCommandeFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneCommandeFournisseurType::class, $ligneCommandeFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_fournisseur/edit.html.twig', [
            'ligne_commande_fournisseur' => $ligneCommandeFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, LigneCommandeFournisseur $ligneCommandeFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneCommandeFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneCommandeFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
