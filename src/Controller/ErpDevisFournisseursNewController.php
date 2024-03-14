<?php

namespace App\Controller;

use App\Entity\ErpDevisFournisseursNew;
use App\Form\ErpDevisFournisseursNewType;
use App\Repository\ErpDevisFournisseursNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/devis/fournisseurs/new')]
class ErpDevisFournisseursNewController extends AbstractController
{
    #[Route('/', name: 'app_erp_devis_fournisseurs_new_index', methods: ['GET'])]
    public function index(ErpDevisFournisseursNewRepository $erpDevisFournisseursNewRepository): Response
    {
        return $this->render('erp_devis_fournisseurs_new/index.html.twig', [
            'erp_devis_fournisseurs_news' => $erpDevisFournisseursNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_devis_fournisseurs_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpDevisFournisseursNew = new ErpDevisFournisseursNew();
        $form = $this->createForm(ErpDevisFournisseursNewType::class, $erpDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpDevisFournisseursNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_devis_fournisseurs_new/new.html.twig', [
            'erp_devis_fournisseurs_new' => $erpDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_devis_fournisseurs_new_show', methods: ['GET'])]
    public function show(ErpDevisFournisseursNew $erpDevisFournisseursNew): Response
    {
        return $this->render('erp_devis_fournisseurs_new/show.html.twig', [
            'erp_devis_fournisseurs_new' => $erpDevisFournisseursNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_devis_fournisseurs_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpDevisFournisseursNew $erpDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpDevisFournisseursNewType::class, $erpDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_devis_fournisseurs_new/edit.html.twig', [
            'erp_devis_fournisseurs_new' => $erpDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_devis_fournisseurs_new_delete', methods: ['POST'])]
    public function delete(Request $request, ErpDevisFournisseursNew $erpDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpDevisFournisseursNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpDevisFournisseursNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
