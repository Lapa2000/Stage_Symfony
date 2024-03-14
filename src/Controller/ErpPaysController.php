<?php

namespace App\Controller;

use App\Entity\ErpPays;
use App\Form\ErpPaysType;
use App\Repository\ErpPaysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/pays')]
class ErpPaysController extends AbstractController
{
    #[Route('/', name: 'app_erp_pays_index', methods: ['GET'])]
    public function index(ErpPaysRepository $erpPaysRepository): Response
    {
        return $this->render('erp_pays/index.html.twig', [
            'erp_pays' => $erpPaysRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_pays_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpPay = new ErpPays();
        $form = $this->createForm(ErpPaysType::class, $erpPay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpPay);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_pays/new.html.twig', [
            'erp_pay' => $erpPay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_pays_show', methods: ['GET'])]
    public function show(ErpPays $erpPay): Response
    {
        return $this->render('erp_pays/show.html.twig', [
            'erp_pay' => $erpPay,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_pays_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpPays $erpPay, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpPaysType::class, $erpPay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_pays/edit.html.twig', [
            'erp_pay' => $erpPay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_pays_delete', methods: ['POST'])]
    public function delete(Request $request, ErpPays $erpPay, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpPay->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpPay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_pays_index', [], Response::HTTP_SEE_OTHER);
    }
}
