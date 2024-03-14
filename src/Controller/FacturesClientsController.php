<?php

namespace App\Controller;

use App\Entity\FacturesClients;
use App\Form\FacturesClientsType;
use App\Repository\FacturesClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/factures/clients')]
class FacturesClientsController extends AbstractController
{
    #[Route('/', name: 'app_factures_clients_index', methods: ['GET'])]
    public function index(FacturesClientsRepository $facturesClientsRepository): Response
    {
        return $this->render('factures_clients/index.html.twig', [
            'factures_clients' => $facturesClientsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_factures_clients_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $facturesClient = new FacturesClients();
        $form = $this->createForm(FacturesClientsType::class, $facturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($facturesClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_factures_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factures_clients/new.html.twig', [
            'factures_client' => $facturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factures_clients_show', methods: ['GET'])]
    public function show(FacturesClients $facturesClient): Response
    {
        return $this->render('factures_clients/show.html.twig', [
            'factures_client' => $facturesClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_factures_clients_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FacturesClients $facturesClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FacturesClientsType::class, $facturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_factures_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factures_clients/edit.html.twig', [
            'factures_client' => $facturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factures_clients_delete', methods: ['POST'])]
    public function delete(Request $request, FacturesClients $facturesClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facturesClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($facturesClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_factures_clients_index', [], Response::HTTP_SEE_OTHER);
    }
}
