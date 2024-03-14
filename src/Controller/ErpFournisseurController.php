<?php

namespace App\Controller;

use App\Entity\ErpFournisseur;
use App\Form\ErpFournisseurType;
use App\Repository\ErpFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/fournisseur')]
class ErpFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_erp_fournisseur_index', methods: ['GET'])]
    public function index(ErpFournisseurRepository $erpFournisseurRepository): Response
    {
        return $this->render('erp_fournisseur/index.html.twig', [
            'erp_fournisseurs' => $erpFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpFournisseur = new ErpFournisseur();
        $form = $this->createForm(ErpFournisseurType::class, $erpFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_fournisseur/new.html.twig', [
            'erp_fournisseur' => $erpFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_fournisseur_show', methods: ['GET'])]
    public function show(ErpFournisseur $erpFournisseur): Response
    {
        return $this->render('erp_fournisseur/show.html.twig', [
            'erp_fournisseur' => $erpFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpFournisseur $erpFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpFournisseurType::class, $erpFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_fournisseur/edit.html.twig', [
            'erp_fournisseur' => $erpFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, ErpFournisseur $erpFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
