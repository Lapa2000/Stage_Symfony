<?php

namespace App\Controller;

use App\Entity\ErpCatalogue;
use App\Form\ErpCatalogueType;
use App\Repository\ErpCatalogueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/catalogue')]
class ErpCatalogueController extends AbstractController
{
    #[Route('/', name: 'app_erp_catalogue_index', methods: ['GET'])]
    public function index(ErpCatalogueRepository $erpCatalogueRepository): Response
    {
        return $this->render('erp_catalogue/index.html.twig', [
            'erp_catalogues' => $erpCatalogueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_catalogue_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpCatalogue = new ErpCatalogue();
        $form = $this->createForm(ErpCatalogueType::class, $erpCatalogue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpCatalogue);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_catalogue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_catalogue/new.html.twig', [
            'erp_catalogue' => $erpCatalogue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_catalogue_show', methods: ['GET'])]
    public function show(ErpCatalogue $erpCatalogue): Response
    {
        return $this->render('erp_catalogue/show.html.twig', [
            'erp_catalogue' => $erpCatalogue,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_catalogue_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpCatalogue $erpCatalogue, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpCatalogueType::class, $erpCatalogue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_catalogue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_catalogue/edit.html.twig', [
            'erp_catalogue' => $erpCatalogue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_catalogue_delete', methods: ['POST'])]
    public function delete(Request $request, ErpCatalogue $erpCatalogue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpCatalogue->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpCatalogue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_catalogue_index', [], Response::HTTP_SEE_OTHER);
    }
}
