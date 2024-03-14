<?php

namespace App\Controller;

use App\Entity\ErpClient;
use App\Form\ErpClientType;
use App\Repository\ErpClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/client')]
class ErpClientController extends AbstractController
{
    #[Route('/', name: 'app_erp_client_index', methods: ['GET'])]
    public function index(ErpClientRepository $erpClientRepository): Response
    {
        return $this->render('erp_client/index.html.twig', [
            'erp_clients' => $erpClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpClient = new ErpClient();
        $form = $this->createForm(ErpClientType::class, $erpClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_client/new.html.twig', [
            'erp_client' => $erpClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_client_show', methods: ['GET'])]
    public function show(ErpClient $erpClient): Response
    {
        return $this->render('erp_client/show.html.twig', [
            'erp_client' => $erpClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpClient $erpClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpClientType::class, $erpClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_client/edit.html.twig', [
            'erp_client' => $erpClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_client_delete', methods: ['POST'])]
    public function delete(Request $request, ErpClient $erpClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
