<?php

namespace App\Controller;

use App\Entity\LigneDevisligneFactureClientNewData;
use App\Form\LigneDevisligneFactureClientNewDataType;
use App\Repository\LigneDevisligneFactureClientNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ligne/devisligne/facture/client/new/data')]
class LigneDevisligneFactureClientNewDataController extends AbstractController
{
    #[Route('/', name: 'app_ligne_devisligne_facture_client_new_data_index', methods: ['GET'])]
    public function index(LigneDevisligneFactureClientNewDataRepository $ligneDevisligneFactureClientNewDataRepository): Response
    {
        return $this->render('ligne_devisligne_facture_client_new_data/index.html.twig', [
            'ligne_devisligne_facture_client_new_datas' => $ligneDevisligneFactureClientNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ligne_devisligne_facture_client_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ligneDevisligneFactureClientNewDatum = new LigneDevisligneFactureClientNewData();
        $form = $this->createForm(LigneDevisligneFactureClientNewDataType::class, $ligneDevisligneFactureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ligneDevisligneFactureClientNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devisligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devisligne_facture_client_new_data/new.html.twig', [
            'ligne_devisligne_facture_client_new_datum' => $ligneDevisligneFactureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devisligne_facture_client_new_data_show', methods: ['GET'])]
    public function show(LigneDevisligneFactureClientNewData $ligneDevisligneFactureClientNewDatum): Response
    {
        return $this->render('ligne_devisligne_facture_client_new_data/show.html.twig', [
            'ligne_devisligne_facture_client_new_datum' => $ligneDevisligneFactureClientNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ligne_devisligne_facture_client_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LigneDevisligneFactureClientNewData $ligneDevisligneFactureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LigneDevisligneFactureClientNewDataType::class, $ligneDevisligneFactureClientNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ligne_devisligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ligne_devisligne_facture_client_new_data/edit.html.twig', [
            'ligne_devisligne_facture_client_new_datum' => $ligneDevisligneFactureClientNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ligne_devisligne_facture_client_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, LigneDevisligneFactureClientNewData $ligneDevisligneFactureClientNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDevisligneFactureClientNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ligneDevisligneFactureClientNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ligne_devisligne_facture_client_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
