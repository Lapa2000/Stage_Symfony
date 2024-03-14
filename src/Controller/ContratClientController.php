<?php

namespace App\Controller;

use App\Entity\ContratClient;
use App\Form\ContratClientType;
use App\Repository\ContratClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contrat/client')]
class ContratClientController extends AbstractController
{
    #[Route('/', name: 'app_contrat_client_index', methods: ['GET'])]
    public function index(ContratClientRepository $contratClientRepository): Response
    {
        return $this->render('contrat_client/index.html.twig', [
            'contrat_clients' => $contratClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contrat_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contratClient = new ContratClient();
        $form = $this->createForm(ContratClientType::class, $contratClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contratClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat_client/new.html.twig', [
            'contrat_client' => $contratClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_client_show', methods: ['GET'])]
    public function show(ContratClient $contratClient): Response
    {
        return $this->render('contrat_client/show.html.twig', [
            'contrat_client' => $contratClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratClient $contratClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratClientType::class, $contratClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat_client/edit.html.twig', [
            'contrat_client' => $contratClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_client_delete', methods: ['POST'])]
    public function delete(Request $request, ContratClient $contratClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contratClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
