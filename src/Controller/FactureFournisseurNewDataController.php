<?php

namespace App\Controller;

use App\Entity\FactureFournisseurNewData;
use App\Form\FactureFournisseurNewDataType;
use App\Repository\FactureFournisseurNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/facture/fournisseur/new/data')]
class FactureFournisseurNewDataController extends AbstractController
{
    #[Route('/', name: 'app_facture_fournisseur_new_data_index', methods: ['GET'])]
    public function index(FactureFournisseurNewDataRepository $factureFournisseurNewDataRepository): Response
    {
        return $this->render('facture_fournisseur_new_data/index.html.twig', [
            'facture_fournisseur_new_datas' => $factureFournisseurNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_facture_fournisseur_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $factureFournisseurNewDatum = new FactureFournisseurNewData();
        $form = $this->createForm(FactureFournisseurNewDataType::class, $factureFournisseurNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($factureFournisseurNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_fournisseur_new_data/new.html.twig', [
            'facture_fournisseur_new_datum' => $factureFournisseurNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_fournisseur_new_data_show', methods: ['GET'])]
    public function show(FactureFournisseurNewData $factureFournisseurNewDatum): Response
    {
        return $this->render('facture_fournisseur_new_data/show.html.twig', [
            'facture_fournisseur_new_datum' => $factureFournisseurNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_facture_fournisseur_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FactureFournisseurNewData $factureFournisseurNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FactureFournisseurNewDataType::class, $factureFournisseurNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_fournisseur_new_data/edit.html.twig', [
            'facture_fournisseur_new_datum' => $factureFournisseurNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_fournisseur_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, FactureFournisseurNewData $factureFournisseurNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureFournisseurNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($factureFournisseurNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
