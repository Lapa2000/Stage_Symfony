<?php

namespace App\Controller;

use App\Entity\ErpProduitCompose;
use App\Form\ErpProduitComposeType;
use App\Repository\ErpProduitComposeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/produit/compose')]
class ErpProduitComposeController extends AbstractController
{
    #[Route('/', name: 'app_erp_produit_compose_index', methods: ['GET'])]
    public function index(ErpProduitComposeRepository $erpProduitComposeRepository): Response
    {
        return $this->render('erp_produit_compose/index.html.twig', [
            'erp_produit_composes' => $erpProduitComposeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_produit_compose_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpProduitCompose = new ErpProduitCompose();
        $form = $this->createForm(ErpProduitComposeType::class, $erpProduitCompose);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpProduitCompose);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_produit_compose_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_produit_compose/new.html.twig', [
            'erp_produit_compose' => $erpProduitCompose,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_produit_compose_show', methods: ['GET'])]
    public function show(ErpProduitCompose $erpProduitCompose): Response
    {
        return $this->render('erp_produit_compose/show.html.twig', [
            'erp_produit_compose' => $erpProduitCompose,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_produit_compose_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpProduitCompose $erpProduitCompose, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpProduitComposeType::class, $erpProduitCompose);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_produit_compose_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_produit_compose/edit.html.twig', [
            'erp_produit_compose' => $erpProduitCompose,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_produit_compose_delete', methods: ['POST'])]
    public function delete(Request $request, ErpProduitCompose $erpProduitCompose, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpProduitCompose->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpProduitCompose);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_produit_compose_index', [], Response::HTTP_SEE_OTHER);
    }
}
