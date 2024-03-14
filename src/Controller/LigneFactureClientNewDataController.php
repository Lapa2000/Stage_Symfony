<?php

namespace App\Controller;

use App\Entity\LigneFactureClientNewData;
use App\Form\LigneFactureClientNewDataType;
use App\Repository\LigneFactureClientNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/facture/client/new/data')]
class LigneFactureClientNewDataController extends AbstractController
{
    #[Route('/', name: 'app_ligne_facture_client_new_data_index', methods: ['GET'])]
    public function index(LigneFactureClientNewDataRepository $ligneFactureClientNewDataRepository): Response
    {
        return $this->render('ligne_facture_client_new_data/index.html.twig', [
            'ligne_facture_client_new_datas' => $ligneFactureClientNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_facture_client_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneFactureClientNewDatum = new LigneFactureClientNewData();
        $form = $this->createForm(LigneFactureClientNewDataType::class, $ligneFactureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneFactureClientNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture_client_new_data/new.html.twig', [
            'ligne_facture_client_new_datum' => $ligneFactureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_client_new_data_show', methods: ['GET'])]
    public function show(LigneFactureClientNewData $ligneFactureClientNewDatum): Response
    {
        return $this->render('ligne_facture_client_new_data/show.html.twig', [
            'ligne_facture_client_new_datum' => $ligneFactureClientNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_facture_client_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneFactureClientNewData $ligneFactureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneFactureClientNewDataType::class, $ligneFactureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_facture_client_new_data/edit.html.twig', [
            'ligne_facture_client_new_datum' => $ligneFactureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_facture_client_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, LigneFactureClientNewData $ligneFactureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFactureClientNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneFactureClientNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
