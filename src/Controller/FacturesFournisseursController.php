<?php

namespace App\Controller;

use App\Entity\FacturesFournisseurs;
use App\Form\FacturesFournisseursType;
use App\Repository\FacturesFournisseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/factures/fournisseurs')]
class FacturesFournisseursController extends AbstractController
{
    #[Route('/', name: 'app_factures_fournisseurs_index', methods: ['GET'])]
    public function index(FacturesFournisseursRepository $facturesFournisseursRepository): Response
    {
        return $this->render('factures_fournisseurs/index.html.twig', [
            'factures_fournisseurs' => $facturesFournisseursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_factures_fournisseurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $facturesFournisseur = new FacturesFournisseurs();
        $form = $this->createForm(FacturesFournisseursType::class, $facturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($facturesFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factures_fournisseurs/new.html.twig', [
            'factures_fournisseur' => $facturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factures_fournisseurs_show', methods: ['GET'])]
    public function show(FacturesFournisseurs $facturesFournisseur): Response
    {
        return $this->render('factures_fournisseurs/show.html.twig', [
            'factures_fournisseur' => $facturesFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_factures_fournisseurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FacturesFournisseurs $facturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FacturesFournisseursType::class, $facturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factures_fournisseurs/edit.html.twig', [
            'factures_fournisseur' => $facturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factures_fournisseurs_delete', methods: ['POST'])]
    public function delete(Request $request, FacturesFournisseurs $facturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facturesFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($facturesFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
