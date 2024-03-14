<?php

namespace App\Controller;

use App\Entity\ErpFacturesClientNew;
use App\Form\ErpFacturesClientNewType;
use App\Repository\ErpFacturesClientNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/factures/client/new')]
class ErpFacturesClientNewController extends AbstractController
{
    #[Route('/', name: 'app_erp_factures_client_new_index', methods: ['GET'])]
    public function index(ErpFacturesClientNewRepository $erpFacturesClientNewRepository): Response
    {
        return $this->render('erp_factures_client_new/index.html.twig', [
            'erp_factures_client_news' => $erpFacturesClientNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_factures_client_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpFacturesClientNew = new ErpFacturesClientNew();
        $form = $this->createForm(ErpFacturesClientNewType::class, $erpFacturesClientNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpFacturesClientNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_factures_client_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_factures_client_new/new.html.twig', [
            'erp_factures_client_new' => $erpFacturesClientNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_factures_client_new_show', methods: ['GET'])]
    public function show(ErpFacturesClientNew $erpFacturesClientNew): Response
    {
        return $this->render('erp_factures_client_new/show.html.twig', [
            'erp_factures_client_new' => $erpFacturesClientNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_factures_client_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpFacturesClientNew $erpFacturesClientNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpFacturesClientNewType::class, $erpFacturesClientNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_factures_client_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_factures_client_new/edit.html.twig', [
            'erp_factures_client_new' => $erpFacturesClientNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_factures_client_new_delete', methods: ['POST'])]
    public function delete(Request $request, ErpFacturesClientNew $erpFacturesClientNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpFacturesClientNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpFacturesClientNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_factures_client_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
