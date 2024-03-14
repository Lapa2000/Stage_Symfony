<?php

namespace App\Controller;

use App\Entity\FactureClientNewData;
use App\Form\FactureClientNewDataType;
use App\Repository\FactureClientNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/facture/client/new/data')]
class FactureClientNewDataController extends AbstractController
{
    #[Route('/', name: 'app_facture_client_new_data_index', methods: ['GET'])]
    public function index(FactureClientNewDataRepository $factureClientNewDataRepository): Response
    {
        return $this->render('facture_client_new_data/index.html.twig', [
            'facture_client_new_datas' => $factureClientNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_facture_client_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $factureClientNewDatum = new FactureClientNewData();
        $form = $this->createForm(FactureClientNewDataType::class, $factureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($factureClientNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_client_new_data/new.html.twig', [
            'facture_client_new_datum' => $factureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_client_new_data_show', methods: ['GET'])]
    public function show(FactureClientNewData $factureClientNewDatum): Response
    {
        return $this->render('facture_client_new_data/show.html.twig', [
            'facture_client_new_datum' => $factureClientNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_facture_client_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FactureClientNewData $factureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FactureClientNewDataType::class, $factureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_client_new_data/edit.html.twig', [
            'facture_client_new_datum' => $factureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_client_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, FactureClientNewData $factureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureClientNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($factureClientNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
