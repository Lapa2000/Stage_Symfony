<?php

namespace App\Controller;

use App\Entity\FactureAutresNewData;
use App\Form\FactureAutresNewDataType;
use App\Repository\FactureAutresNewDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/facture/autres/new/data')]
class FactureAutresNewDataController extends AbstractController
{
    #[Route('/', name: 'app_facture_autres_new_data_index', methods: ['GET'])]
    public function index(FactureAutresNewDataRepository $factureAutresNewDataRepository): Response
    {
        return $this->render('facture_autres_new_data/index.html.twig', [
            'facture_autres_new_datas' => $factureAutresNewDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_facture_autres_new_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $factureAutresNewDatum = new FactureAutresNewData();
        $form = $this->createForm(FactureAutresNewDataType::class, $factureAutresNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($factureAutresNewDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_autres_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_autres_new_data/new.html.twig', [
            'facture_autres_new_datum' => $factureAutresNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_autres_new_data_show', methods: ['GET'])]
    public function show(FactureAutresNewData $factureAutresNewDatum): Response
    {
        return $this->render('facture_autres_new_data/show.html.twig', [
            'facture_autres_new_datum' => $factureAutresNewDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_facture_autres_new_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FactureAutresNewData $factureAutresNewDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FactureAutresNewDataType::class, $factureAutresNewDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_facture_autres_new_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture_autres_new_data/edit.html.twig', [
            'facture_autres_new_datum' => $factureAutresNewDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_facture_autres_new_data_delete', methods: ['POST'])]
    public function delete(Request $request, FactureAutresNewData $factureAutresNewDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factureAutresNewDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($factureAutresNewDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_facture_autres_new_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
