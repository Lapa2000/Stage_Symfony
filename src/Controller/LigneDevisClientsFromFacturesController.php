<?php

namespace App\Controller;

use App\Entity\LigneDevisClientsFromFactures;
use App\Form\LigneDevisClientsFromFacturesType;
use App\Repository\LigneDevisClientsFromFacturesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/devis/clients/from/factures')]
class LigneDevisClientsFromFacturesController extends AbstractController
{
    #[Route('/', name: 'app_ligne_devis_clients_from_factures_index', methods: ['GET'])]
    public function index(LigneDevisClientsFromFacturesRepository $ligneDevisClientsFromFacturesRepository): Response
    {
        return $this->render('ligne_devis_clients_from_factures/index.html.twig', [
            'ligne_devis_clients_from_factures' => $ligneDevisClientsFromFacturesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_devis_clients_from_factures_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneDevisClientsFromFacture = new LigneDevisClientsFromFactures();
        $form = $this->createForm(LigneDevisClientsFromFacturesType::class, $ligneDevisClientsFromFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneDevisClientsFromFacture);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_clients_from_factures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_clients_from_factures/new.html.twig', [
            'ligne_devis_clients_from_facture' => $ligneDevisClientsFromFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_clients_from_factures_show', methods: ['GET'])]
    public function show(LigneDevisClientsFromFactures $ligneDevisClientsFromFacture): Response
    {
        return $this->render('ligne_devis_clients_from_factures/show.html.twig', [
            'ligne_devis_clients_from_facture' => $ligneDevisClientsFromFacture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_devis_clients_from_factures_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneDevisClientsFromFactures $ligneDevisClientsFromFacture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneDevisClientsFromFacturesType::class, $ligneDevisClientsFromFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devis_clients_from_factures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devis_clients_from_factures/edit.html.twig', [
            'ligne_devis_clients_from_facture' => $ligneDevisClientsFromFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devis_clients_from_factures_delete', methods: ['POST'])]
    public function delete(Request $request, LigneDevisClientsFromFactures $ligneDevisClientsFromFacture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDevisClientsFromFacture->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneDevisClientsFromFacture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_devis_clients_from_factures_index', [], Response::HTTP_SEE_OTHER);
    }
}
