<?php

namespace App\Controller;

use App\Entity\ErpConsomationParc;
use App\Form\ErpConsomationParcType;
use App\Repository\ErpConsomationParcRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/consomation/parc')]
class ErpConsomationParcController extends AbstractController
{
    #[Route('/', name: 'app_erp_consomation_parc_index', methods: ['GET'])]
    public function index(ErpConsomationParcRepository $erpConsomationParcRepository): Response
    {
        return $this->render('erp_consomation_parc/index.html.twig', [
            'erp_consomation_parcs' => $erpConsomationParcRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_consomation_parc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpConsomationParc = new ErpConsomationParc();
        $form = $this->createForm(ErpConsomationParcType::class, $erpConsomationParc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpConsomationParc);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_consomation_parc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_consomation_parc/new.html.twig', [
            'erp_consomation_parc' => $erpConsomationParc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_consomation_parc_show', methods: ['GET'])]
    public function show(ErpConsomationParc $erpConsomationParc): Response
    {
        return $this->render('erp_consomation_parc/show.html.twig', [
            'erp_consomation_parc' => $erpConsomationParc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_consomation_parc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpConsomationParc $erpConsomationParc, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpConsomationParcType::class, $erpConsomationParc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_consomation_parc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_consomation_parc/edit.html.twig', [
            'erp_consomation_parc' => $erpConsomationParc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_consomation_parc_delete', methods: ['POST'])]
    public function delete(Request $request, ErpConsomationParc $erpConsomationParc, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpConsomationParc->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpConsomationParc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_consomation_parc_index', [], Response::HTTP_SEE_OTHER);
    }
}
