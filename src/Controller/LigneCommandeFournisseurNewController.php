<?php

namespace App\Controller;

use App\Entity\LigneCommandeFournisseurNew;
use App\Form\LigneCommandeFournisseurNewType;
use App\Repository\LigneCommandeFournisseurNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/commande/fournisseur/new')]
class LigneCommandeFournisseurNewController extends AbstractController
{
    #[Route('/', name: 'app_ligne_commande_fournisseur_new_index', methods: ['GET'])]
    public function index(LigneCommandeFournisseurNewRepository $ligneCommandeFournisseurNewRepository): Response
    {
        return $this->render('ligne_commande_fournisseur_new/index.html.twig', [
            'ligne_commande_fournisseur_news' => $ligneCommandeFournisseurNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_commande_fournisseur_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneCommandeFournisseurNew = new LigneCommandeFournisseurNew();
        $form = $this->createForm(LigneCommandeFournisseurNewType::class, $ligneCommandeFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneCommandeFournisseurNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_fournisseur_new/new.html.twig', [
            'ligne_commande_fournisseur_new' => $ligneCommandeFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_fournisseur_new_show', methods: ['GET'])]
    public function show(LigneCommandeFournisseurNew $ligneCommandeFournisseurNew): Response
    {
        return $this->render('ligne_commande_fournisseur_new/show.html.twig', [
            'ligne_commande_fournisseur_new' => $ligneCommandeFournisseurNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_commande_fournisseur_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneCommandeFournisseurNew $ligneCommandeFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneCommandeFournisseurNewType::class, $ligneCommandeFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_fournisseur_new/edit.html.twig', [
            'ligne_commande_fournisseur_new' => $ligneCommandeFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_fournisseur_new_delete', methods: ['POST'])]
    public function delete(Request $request, LigneCommandeFournisseurNew $ligneCommandeFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneCommandeFournisseurNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneCommandeFournisseurNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
