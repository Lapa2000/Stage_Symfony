<?php

namespace App\Controller;

use App\Entity\ErpEcritureComptable;
use App\Form\ErpEcritureComptableType;
use App\Repository\ErpEcritureComptableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ecriture/comptable')]
class ErpEcritureComptableController extends AbstractController
{
    #[Route('/', name: 'app_erp_ecriture_comptable_index', methods: ['GET'])]
    public function index(ErpEcritureComptableRepository $erpEcritureComptableRepository): Response
    {
        return $this->render('erp_ecriture_comptable/index.html.twig', [
            'erp_ecriture_comptables' => $erpEcritureComptableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ecriture_comptable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpEcritureComptable = new ErpEcritureComptable();
        $form = $this->createForm(ErpEcritureComptableType::class, $erpEcritureComptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpEcritureComptable);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ecriture_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ecriture_comptable/new.html.twig', [
            'erp_ecriture_comptable' => $erpEcritureComptable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ecriture_comptable_show', methods: ['GET'])]
    public function show(ErpEcritureComptable $erpEcritureComptable): Response
    {
        return $this->render('erp_ecriture_comptable/show.html.twig', [
            'erp_ecriture_comptable' => $erpEcritureComptable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ecriture_comptable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpEcritureComptable $erpEcritureComptable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpEcritureComptableType::class, $erpEcritureComptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ecriture_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ecriture_comptable/edit.html.twig', [
            'erp_ecriture_comptable' => $erpEcritureComptable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ecriture_comptable_delete', methods: ['POST'])]
    public function delete(Request $request, ErpEcritureComptable $erpEcritureComptable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpEcritureComptable->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpEcritureComptable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ecriture_comptable_index', [], Response::HTTP_SEE_OTHER);
    }
}
