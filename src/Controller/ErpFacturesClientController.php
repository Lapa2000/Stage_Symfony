<?php

namespace App\Controller;

use App\Entity\ErpFacturesClient;
use App\Form\ErpFacturesClientType;
use App\Repository\ErpFacturesClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/factures/client')]
class ErpFacturesClientController extends AbstractController
{
    #[Route('/', name: 'app_erp_factures_client_index', methods: ['GET'])]
    public function index(ErpFacturesClientRepository $erpFacturesClientRepository): Response
    {
        return $this->render('erp_factures_client/index.html.twig', [
            'erp_factures_clients' => $erpFacturesClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_factures_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpFacturesClient = new ErpFacturesClient();
        $form = $this->createForm(ErpFacturesClientType::class, $erpFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpFacturesClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_factures_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_factures_client/new.html.twig', [
            'erp_factures_client' => $erpFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_factures_client_show', methods: ['GET'])]
    public function show(ErpFacturesClient $erpFacturesClient): Response
    {
        return $this->render('erp_factures_client/show.html.twig', [
            'erp_factures_client' => $erpFacturesClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_factures_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpFacturesClient $erpFacturesClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpFacturesClientType::class, $erpFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_factures_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_factures_client/edit.html.twig', [
            'erp_factures_client' => $erpFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_factures_client_delete', methods: ['POST'])]
    public function delete(Request $request, ErpFacturesClient $erpFacturesClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpFacturesClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpFacturesClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_factures_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
