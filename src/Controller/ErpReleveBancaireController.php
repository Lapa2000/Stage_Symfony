<?php

namespace App\Controller;

use App\Entity\ErpReleveBancaire;
use App\Form\ErpReleveBancaireType;
use App\Repository\ErpReleveBancaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/releve/bancaire')]
class ErpReleveBancaireController extends AbstractController
{
    #[Route('/', name: 'app_erp_releve_bancaire_index', methods: ['GET'])]
    public function index(ErpReleveBancaireRepository $erpReleveBancaireRepository): Response
    {
        return $this->render('erp_releve_bancaire/index.html.twig', [
            'erp_releve_bancaires' => $erpReleveBancaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_releve_bancaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpReleveBancaire = new ErpReleveBancaire();
        $form = $this->createForm(ErpReleveBancaireType::class, $erpReleveBancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpReleveBancaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_releve_bancaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_releve_bancaire/new.html.twig', [
            'erp_releve_bancaire' => $erpReleveBancaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_releve_bancaire_show', methods: ['GET'])]
    public function show(ErpReleveBancaire $erpReleveBancaire): Response
    {
        return $this->render('erp_releve_bancaire/show.html.twig', [
            'erp_releve_bancaire' => $erpReleveBancaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_releve_bancaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpReleveBancaire $erpReleveBancaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpReleveBancaireType::class, $erpReleveBancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_releve_bancaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_releve_bancaire/edit.html.twig', [
            'erp_releve_bancaire' => $erpReleveBancaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_releve_bancaire_delete', methods: ['POST'])]
    public function delete(Request $request, ErpReleveBancaire $erpReleveBancaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpReleveBancaire->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpReleveBancaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_releve_bancaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
