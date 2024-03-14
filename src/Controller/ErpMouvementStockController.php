<?php

namespace App\Controller;

use App\Entity\ErpMouvementStock;
use App\Form\ErpMouvementStockType;
use App\Repository\ErpMouvementStockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/mouvement/stock')]
class ErpMouvementStockController extends AbstractController
{
    #[Route('/', name: 'app_erp_mouvement_stock_index', methods: ['GET'])]
    public function index(ErpMouvementStockRepository $erpMouvementStockRepository): Response
    {
        return $this->render('erp_mouvement_stock/index.html.twig', [
            'erp_mouvement_stocks' => $erpMouvementStockRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_mouvement_stock_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpMouvementStock = new ErpMouvementStock();
        $form = $this->createForm(ErpMouvementStockType::class, $erpMouvementStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpMouvementStock);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_mouvement_stock_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_mouvement_stock/new.html.twig', [
            'erp_mouvement_stock' => $erpMouvementStock,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_mouvement_stock_show', methods: ['GET'])]
    public function show(ErpMouvementStock $erpMouvementStock): Response
    {
        return $this->render('erp_mouvement_stock/show.html.twig', [
            'erp_mouvement_stock' => $erpMouvementStock,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_mouvement_stock_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpMouvementStock $erpMouvementStock, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpMouvementStockType::class, $erpMouvementStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_mouvement_stock_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_mouvement_stock/edit.html.twig', [
            'erp_mouvement_stock' => $erpMouvementStock,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_mouvement_stock_delete', methods: ['POST'])]
    public function delete(Request $request, ErpMouvementStock $erpMouvementStock, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpMouvementStock->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpMouvementStock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_mouvement_stock_index', [], Response::HTTP_SEE_OTHER);
    }
}
