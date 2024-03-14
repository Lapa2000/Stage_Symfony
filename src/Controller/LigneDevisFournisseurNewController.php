<?php

namespace App\Controller;

use App\Entity\LigneDevisFournisseurNew;
use App\Form\LigneDevisFournisseurNewType;
use App\Repository\LigneDevisFournisseurNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/devis/fournisseur/new')]
class LigneDevisFournisseurNewController extends AbstractController
{
    #[Route('/', name: 'app_ligne_devis_fournisseur_new_index', methods: ['GET'])]
    public function index(LigneDevisFournisseurNewRepository $ligneDevisFournisseurNewRepository): Response
    {
        return $this->render('ligne_devis_fournisseur_new/index.html.twig', [
            'ligne_devis_fournisseur_news' => $ligneDevisFournisseurNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_devis_fournisseur_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneDevisFournisseurNew = new LigneDevisFournisseurNew();
        $form = $this->createForm(LigneDevisFournisseurNewType::class, $ligneDevisFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneDevisFournisseurNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_fournisseur_new/new.html.twig', [
            'ligne_devis_fournisseur_new' => $ligneDevisFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_fournisseur_new_show', methods: ['GET'])]
    public function show(LigneDevisFournisseurNew $ligneDevisFournisseurNew): Response
    {
        return $this->render('ligne_devis_fournisseur_new/show.html.twig', [
            'ligne_devis_fournisseur_new' => $ligneDevisFournisseurNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_devis_fournisseur_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneDevisFournisseurNew $ligneDevisFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneDevisFournisseurNewType::class, $ligneDevisFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_fournisseur_new/edit.html.twig', [
            'ligne_devis_fournisseur_new' => $ligneDevisFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_fournisseur_new_delete', methods: ['POST'])]
    public function delete(Request $request, LigneDevisFournisseurNew $ligneDevisFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDevisFournisseurNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneDevisFournisseurNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
