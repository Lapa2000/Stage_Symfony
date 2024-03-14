<?php

namespace App\Controller;

use App\Entity\ErpProduit;
use App\Form\ErpProduitType;
use App\Repository\ErpProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/produit')]
class ErpProduitController extends AbstractController
{
    #[Route('/', name: 'app_erp_produit_index', methods: ['GET'])]
    public function index(ErpProduitRepository $erpProduitRepository): Response
    {
        return $this->render('erp_produit/index.html.twig', [
            'erp_produits' => $erpProduitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpProduit = new ErpProduit();
        $form = $this->createForm(ErpProduitType::class, $erpProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpProduit);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_produit/new.html.twig', [
            'erp_produit' => $erpProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_produit_show', methods: ['GET'])]
    public function show(ErpProduit $erpProduit): Response
    {
        return $this->render('erp_produit/show.html.twig', [
            'erp_produit' => $erpProduit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpProduit $erpProduit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpProduitType::class, $erpProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_produit/edit.html.twig', [
            'erp_produit' => $erpProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_produit_delete', methods: ['POST'])]
    public function delete(Request $request, ErpProduit $erpProduit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpProduit->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpProduit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
