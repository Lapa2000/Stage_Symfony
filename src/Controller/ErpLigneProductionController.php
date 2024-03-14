<?php

namespace App\Controller;

use App\Entity\ErpLigneProduction;
use App\Form\ErpLigneProductionType;
use App\Repository\ErpLigneProductionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ligne/production')]
class ErpLigneProductionController extends AbstractController
{
    #[Route('/', name: 'app_erp_ligne_production_index', methods: ['GET'])]
    public function index(ErpLigneProductionRepository $erpLigneProductionRepository): Response
    {
        return $this->render('erp_ligne_production/index.html.twig', [
            'erp_ligne_productions' => $erpLigneProductionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ligne_production_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpLigneProduction = new ErpLigneProduction();
        $form = $this->createForm(ErpLigneProductionType::class, $erpLigneProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpLigneProduction);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_production/new.html.twig', [
            'erp_ligne_production' => $erpLigneProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_production_show', methods: ['GET'])]
    public function show(ErpLigneProduction $erpLigneProduction): Response
    {
        return $this->render('erp_ligne_production/show.html.twig', [
            'erp_ligne_production' => $erpLigneProduction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ligne_production_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpLigneProduction $erpLigneProduction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpLigneProductionType::class, $erpLigneProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ligne_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ligne_production/edit.html.twig', [
            'erp_ligne_production' => $erpLigneProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ligne_production_delete', methods: ['POST'])]
    public function delete(Request $request, ErpLigneProduction $erpLigneProduction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpLigneProduction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpLigneProduction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ligne_production_index', [], Response::HTTP_SEE_OTHER);
    }
}
