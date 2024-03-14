<?php

namespace App\Controller;

use App\Entity\LigneFactureFournisseurNewData;
use App\Form\LigneFactureFournisseurNewDataType;
use App\Repository\LigneFactureFournisseurNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/facture/fournisseur/new/data')]
class LigneFactureFournisseurNewDataController extends AbstractController
{
    #[Route('/', name: 'app_ligne_facture_fournisseur_new_data_index', methods: ['GET'])]
    public function index(LigneFactureFournisseurNewDataRepository $ligneFactureFournisseurNewDataRepository): Response
    {
        return $this->render('ligne_facture_fournisseur_new_data/index.html.twig', [
            'ligne_facture_fournisseur_new_datas' => $ligneFactureFournisseurNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_facture_fournisseur_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFactureFournisseurNewDatum = new LigneFactureFournisseurNewData();
        $form = $this->createForm(LigneFactureFournisseurNewDataType::class, $ligneFactureFournisseurNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFactureFournisseurNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture_fournisseur_new_data/new.html.twig', [
            'ligne_facture_fournisseur_new_datum' => $ligneFactureFournisseurNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_fournisseur_new_data_show', methods: ['GET'])]
    public function show(LigneFactureFournisseurNewData $ligneFactureFournisseurNewDatum): Response
    {
        return $this->render('ligne_facture_fournisseur_new_data/show.html.twig', [
            'ligne_facture_fournisseur_new_datum' => $ligneFactureFournisseurNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_facture_fournisseur_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFactureFournisseurNewData $ligneFactureFournisseurNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFactureFournisseurNewDataType::class, $ligneFactureFournisseurNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture_fournisseur_new_data/edit.html.twig', [
            'ligne_facture_fournisseur_new_datum' => $ligneFactureFournisseurNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_fournisseur_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFactureFournisseurNewData $ligneFactureFournisseurNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFactureFournisseurNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneFactureFournisseurNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_facture_fournisseur_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
