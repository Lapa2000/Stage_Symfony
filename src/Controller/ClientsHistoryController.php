<?php

namespace App\Controller;

use App\Entity\AvoirClientsHistory;
use App\Form\AvoirClientsHistoryType;
use App\Repository\AvoirClientsHistoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/clients/history')]
class ClientsHistoryController extends AbstractController
{
    #[Route('/', name: 'app_clients_history_index', methods: ['GET'])]
    public function index(AvoirClientsHistoryRepository $avoirClientsHistoryRepository): Response
    {
        return $this->render('clients_history/index.html.twig', [
            'avoir_clients_histories' => $avoirClientsHistoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_clients_history_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avoirClientsHistory = new AvoirClientsHistory();
        $form = $this->createForm(AvoirClientsHistoryType::class, $avoirClientsHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avoirClientsHistory);
            $entityManager->flush();

            return $this->redirectToRoute('app_clients_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clients_history/new.html.twig', [
            'avoir_clients_history' => $avoirClientsHistory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clients_history_show', methods: ['GET'])]
    public function show(AvoirClientsHistory $avoirClientsHistory): Response
    {
        return $this->render('clients_history/show.html.twig', [
            'avoir_clients_history' => $avoirClientsHistory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_clients_history_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvoirClientsHistory $avoirClientsHistory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvoirClientsHistoryType::class, $avoirClientsHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_clients_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clients_history/edit.html.twig', [
            'avoir_clients_history' => $avoirClientsHistory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clients_history_delete', methods: ['POST'])]
    public function delete(Request $request, AvoirClientsHistory $avoirClientsHistory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avoirClientsHistory->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avoirClientsHistory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_clients_history_index', [], Response::HTTP_SEE_OTHER);
    }
}
