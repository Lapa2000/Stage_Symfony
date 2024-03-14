<?php

namespace App\Controller;

use App\Entity\ErpLigneFacturesFournisseurs;
use App\Form\ErpLigneFacturesFournisseursType;
use App\Repository\ErpLigneFacturesFournisseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ligne/factures/fournisseurs')]
class ErpLigneFacturesFournisseursController extends AbstractController
{
    #[Route('/', name: 'app_erp_ligne_factures_fournisseurs_index', methods: ['GET'])]
    public function index(ErpLigneFacturesFournisseursRepository $erpLigneFacturesFournisseursRepository): Response
    {
        return $this->render('erp_ligne_factures_fournisseurs/index.html.twig', [
            'erp_ligne_factures_fournisseurs' => $erpLigneFacturesFournisseursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ligne_factures_fournisseurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpLigneFacturesFournisseur = new ErpLigneFacturesFournisseurs();
        $form = $this->createForm(ErpLigneFacturesFournisseursType::class, $erpLigneFacturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpLigneFacturesFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_factures_fournisseurs/new.html.twig', [
            'erp_ligne_factures_fournisseur' => $erpLigneFacturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_factures_fournisseurs_show', methods: ['GET'])]
    public function show(ErpLigneFacturesFournisseurs $erpLigneFacturesFournisseur): Response
    {
        return $this->render('erp_ligne_factures_fournisseurs/show.html.twig', [
            'erp_ligne_factures_fournisseur' => $erpLigneFacturesFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ligne_factures_fournisseurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpLigneFacturesFournisseurs $erpLigneFacturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpLigneFacturesFournisseursType::class, $erpLigneFacturesFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_factures_fournisseurs/edit.html.twig', [
            'erp_ligne_factures_fournisseur' => $erpLigneFacturesFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_factures_fournisseurs_delete', methods: ['POST'])]
    public function delete(Request $request, ErpLigneFacturesFournisseurs $erpLigneFacturesFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpLigneFacturesFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpLigneFacturesFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ligne_factures_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
