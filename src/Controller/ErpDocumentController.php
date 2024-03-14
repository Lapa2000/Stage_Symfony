<?php

namespace App\Controller;

use App\Entity\ErpDocument;
use App\Form\ErpDocumentType;
use App\Repository\ErpDocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/document')]
class ErpDocumentController extends AbstractController
{
    #[Route('/', name: 'app_erp_document_index', methods: ['GET'])]
    public function index(ErpDocumentRepository $erpDocumentRepository): Response
    {
        return $this->render('erp_document/index.html.twig', [
            'erp_documents' => $erpDocumentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_document_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpDocument = new ErpDocument();
        $form = $this->createForm(ErpDocumentType::class, $erpDocument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpDocument);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_document_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_document/new.html.twig', [
            'erp_document' => $erpDocument,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_document_show', methods: ['GET'])]
    public function show(ErpDocument $erpDocument): Response
    {
        return $this->render('erp_document/show.html.twig', [
            'erp_document' => $erpDocument,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_document_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpDocument $erpDocument, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpDocumentType::class, $erpDocument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_document_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_document/edit.html.twig', [
            'erp_document' => $erpDocument,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_document_delete', methods: ['POST'])]
    public function delete(Request $request, ErpDocument $erpDocument, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpDocument->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpDocument);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_document_index', [], Response::HTTP_SEE_OTHER);
    }
}
