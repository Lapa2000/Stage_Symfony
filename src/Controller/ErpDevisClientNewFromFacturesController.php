<?php

namespace App\Controller;

use App\Entity\ErpDevisClientNewFromFactures;
use App\Form\ErpDevisClientNewFromFacturesType;
use App\Repository\ErpDevisClientNewFromFacturesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/devis/client/new/from/factures')]
class ErpDevisClientNewFromFacturesController extends AbstractController
{
    #[Route('/', name: 'app_erp_devis_client_new_from_factures_index', methods: ['GET'])]
    public function index(ErpDevisClientNewFromFacturesRepository $erpDevisClientNewFromFacturesRepository): Response
    {
        return $this->render('erp_devis_client_new_from_factures/index.html.twig', [
            'erp_devis_client_new_from_factures' => $erpDevisClientNewFromFacturesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_devis_client_new_from_factures_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpDevisClientNewFromFacture = new ErpDevisClientNewFromFactures();
        $form = $this->createForm(ErpDevisClientNewFromFacturesType::class, $erpDevisClientNewFromFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpDevisClientNewFromFacture);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_devis_client_new_from_factures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_devis_client_new_from_factures/new.html.twig', [
            'erp_devis_client_new_from_facture' => $erpDevisClientNewFromFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_devis_client_new_from_factures_show', methods: ['GET'])]
    public function show(ErpDevisClientNewFromFactures $erpDevisClientNewFromFacture): Response
    {
        return $this->render('erp_devis_client_new_from_factures/show.html.twig', [
            'erp_devis_client_new_from_facture' => $erpDevisClientNewFromFacture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_devis_client_new_from_factures_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpDevisClientNewFromFactures $erpDevisClientNewFromFacture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpDevisClientNewFromFacturesType::class, $erpDevisClientNewFromFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_devis_client_new_from_factures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_devis_client_new_from_factures/edit.html.twig', [
            'erp_devis_client_new_from_facture' => $erpDevisClientNewFromFacture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_devis_client_new_from_factures_delete', methods: ['POST'])]
    public function delete(Request $request, ErpDevisClientNewFromFactures $erpDevisClientNewFromFacture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpDevisClientNewFromFacture->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpDevisClientNewFromFacture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_devis_client_new_from_factures_index', [], Response::HTTP_SEE_OTHER);
    }
}
