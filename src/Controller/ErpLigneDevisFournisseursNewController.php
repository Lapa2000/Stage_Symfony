<?php

namespace App\Controller;

use App\Entity\ErpLigneDevisFournisseursNew;
use App\Form\ErpLigneDevisFournisseursNewType;
use App\Repository\ErpLigneDevisFournisseursNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ligne/devis/fournisseurs/new')]
class ErpLigneDevisFournisseursNewController extends AbstractController
{
    #[Route('/', name: 'app_erp_ligne_devis_fournisseurs_new_index', methods: ['GET'])]
    public function index(ErpLigneDevisFournisseursNewRepository $erpLigneDevisFournisseursNewRepository): Response
    {
        return $this->render('erp_ligne_devis_fournisseurs_new/index.html.twig', [
            'erp_ligne_devis_fournisseurs_news' => $erpLigneDevisFournisseursNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ligne_devis_fournisseurs_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpLigneDevisFournisseursNew = new ErpLigneDevisFournisseursNew();
        $form = $this->createForm(ErpLigneDevisFournisseursNewType::class, $erpLigneDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpLigneDevisFournisseursNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_devis_fournisseurs_new/new.html.twig', [
            'erp_ligne_devis_fournisseurs_new' => $erpLigneDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_devis_fournisseurs_new_show', methods: ['GET'])]
    public function show(ErpLigneDevisFournisseursNew $erpLigneDevisFournisseursNew): Response
    {
        return $this->render('erp_ligne_devis_fournisseurs_new/show.html.twig', [
            'erp_ligne_devis_fournisseurs_new' => $erpLigneDevisFournisseursNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ligne_devis_fournisseurs_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpLigneDevisFournisseursNew $erpLigneDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpLigneDevisFournisseursNewType::class, $erpLigneDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_devis_fournisseurs_new/edit.html.twig', [
            'erp_ligne_devis_fournisseurs_new' => $erpLigneDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_devis_fournisseurs_new_delete', methods: ['POST'])]
    public function delete(Request $request, ErpLigneDevisFournisseursNew $erpLigneDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpLigneDevisFournisseursNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpLigneDevisFournisseursNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
