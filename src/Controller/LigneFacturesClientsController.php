<?php

namespace App\Controller;

use App\Entity\LigneFacturesClients;
use App\Form\LigneFacturesClientsType;
use App\Repository\LigneFacturesClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/factures/clients')]
class LigneFacturesClientsController extends AbstractController
{
    #[Route('/', name: 'app_ligne_factures_clients_index', methods: ['GET'])]
    public function index(LigneFacturesClientsRepository $ligneFacturesClientsRepository): Response
    {
        return $this->render('ligne_factures_clients/index.html.twig', [
            'ligne_factures_clients' => $ligneFacturesClientsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_factures_clients_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFacturesClient = new LigneFacturesClients();
        $form = $this->createForm(LigneFacturesClientsType::class, $ligneFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFacturesClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_clients/new.html.twig', [
            'ligne_factures_client' => $ligneFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_clients_show', methods: ['GET'])]
    public function show(LigneFacturesClients $ligneFacturesClient): Response
    {
        return $this->render('ligne_factures_clients/show.html.twig', [
            'ligne_factures_client' => $ligneFacturesClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_factures_clients_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFacturesClients $ligneFacturesClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFacturesClientsType::class, $ligneFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_factures_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_factures_clients/edit.html.twig', [
            'ligne_factures_client' => $ligneFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_factures_clients_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFacturesClients $ligneFacturesClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFacturesClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneFacturesClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_factures_clients_index', [], Response::HTTP_SEE_OTHER);
    }
}
