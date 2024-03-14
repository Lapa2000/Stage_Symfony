<?php

namespace App\Controller;

use App\Entity\ErpLigneFacturesClient;
use App\Form\ErpLigneFacturesClientType;
use App\Repository\ErpLigneFacturesClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ligne/factures/client')]
class ErpLigneFacturesClientController extends AbstractController
{
    #[Route('/', name: 'app_erp_ligne_factures_client_index', methods: ['GET'])]
    public function index(ErpLigneFacturesClientRepository $erpLigneFacturesClientRepository): Response
    {
        return $this->render('erp_ligne_factures_client/index.html.twig', [
            'erp_ligne_factures_clients' => $erpLigneFacturesClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ligne_factures_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpLigneFacturesClient = new ErpLigneFacturesClient();
        $form = $this->createForm(ErpLigneFacturesClientType::class, $erpLigneFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpLigneFacturesClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_factures_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_factures_client/new.html.twig', [
            'erp_ligne_factures_client' => $erpLigneFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_factures_client_show', methods: ['GET'])]
    public function show(ErpLigneFacturesClient $erpLigneFacturesClient): Response
    {
        return $this->render('erp_ligne_factures_client/show.html.twig', [
            'erp_ligne_factures_client' => $erpLigneFacturesClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ligne_factures_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpLigneFacturesClient $erpLigneFacturesClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpLigneFacturesClientType::class, $erpLigneFacturesClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_factures_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_factures_client/edit.html.twig', [
            'erp_ligne_factures_client' => $erpLigneFacturesClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_factures_client_delete', methods: ['POST'])]
    public function delete(Request $request, ErpLigneFacturesClient $erpLigneFacturesClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpLigneFacturesClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpLigneFacturesClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ligne_factures_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
