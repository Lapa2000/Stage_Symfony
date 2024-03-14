<?php

namespace App\Controller;

use App\Entity\LigneCommandeClient;
use App\Form\LigneCommandeClientType;
use App\Repository\LigneCommandeClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/commande/client')]
class LigneCommandeClientController extends AbstractController
{
    #[Route('/', name: 'app_ligne_commande_client_index', methods: ['GET'])]
    public function index(LigneCommandeClientRepository $ligneCommandeClientRepository): Response
    {
        return $this->render('ligne_commande_client/index.html.twig', [
            'ligne_commande_clients' => $ligneCommandeClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_commande_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneCommandeClient = new LigneCommandeClient();
        $form = $this->createForm(LigneCommandeClientType::class, $ligneCommandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneCommandeClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_client/new.html.twig', [
            'ligne_commande_client' => $ligneCommandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_client_show', methods: ['GET'])]
    public function show(LigneCommandeClient $ligneCommandeClient): Response
    {
        return $this->render('ligne_commande_client/show.html.twig', [
            'ligne_commande_client' => $ligneCommandeClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_commande_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneCommandeClient $ligneCommandeClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneCommandeClientType::class, $ligneCommandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_commande_client/edit.html.twig', [
            'ligne_commande_client' => $ligneCommandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_commande_client_delete', methods: ['POST'])]
    public function delete(Request $request, LigneCommandeClient $ligneCommandeClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneCommandeClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneCommandeClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_commande_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
