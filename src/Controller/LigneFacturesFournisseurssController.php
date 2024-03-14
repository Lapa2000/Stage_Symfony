<?php

namespace App\Controller;

use App\Entity\LigneFacturesFournisseurss;
use App\Form\LigneFacturesFournisseurssType;
use App\Repository\LigneFacturesFournisseurssRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/factures/fournisseurss')]
class LigneFacturesFournisseurssController extends AbstractController
{
    #[Route('/', name: 'app_ligne_factures_fournisseurss_index', methods: ['GET'])]
    public function index(LigneFacturesFournisseurssRepository $ligneFacturesFournisseurssRepository): Response
    {
        return $this->render('ligne_factures_fournisseurss/index.html.twig', [
            'ligne_factures_fournisseursses' => $ligneFacturesFournisseurssRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_factures_fournisseurss_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFacturesFournisseurss = new LigneFacturesFournisseurss();
        $form = $this->createForm(LigneFacturesFournisseurssType::class, $ligneFacturesFournisseurss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFacturesFournisseurss);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_fournisseurss_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_fournisseurss/new.html.twig', [
            'ligne_factures_fournisseurss' => $ligneFacturesFournisseurss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_fournisseurss_show', methods: ['GET'])]
    public function show(LigneFacturesFournisseurss $ligneFacturesFournisseurss): Response
    {
        return $this->render('ligne_factures_fournisseurss/show.html.twig', [
            'ligne_factures_fournisseurss' => $ligneFacturesFournisseurss,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_factures_fournisseurss_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFacturesFournisseurss $ligneFacturesFournisseurss, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFacturesFournisseurssType::class, $ligneFacturesFournisseurss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_fournisseurss_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_fournisseurss/edit.html.twig', [
            'ligne_factures_fournisseurss' => $ligneFacturesFournisseurss,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_fournisseurss_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFacturesFournisseurss $ligneFacturesFournisseurss, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFacturesFournisseurss->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneFacturesFournisseurss);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_factures_fournisseurss_index', [], Response::HTTP_SEE_OTHER);
    }
}
