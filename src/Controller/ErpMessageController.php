<?php

namespace App\Controller;

use App\Entity\ErpMessage;
use App\Form\ErpMessageType;
use App\Repository\ErpMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/message')]
class ErpMessageController extends AbstractController
{
    #[Route('/', name: 'app_erp_message_index', methods: ['GET'])]
    public function index(ErpMessageRepository $erpMessageRepository): Response
    {
        return $this->render('erp_message/index.html.twig', [
            'erp_messages' => $erpMessageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_message_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpMessage = new ErpMessage();
        $form = $this->createForm(ErpMessageType::class, $erpMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_message/new.html.twig', [
            'erp_message' => $erpMessage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_message_show', methods: ['GET'])]
    public function show(ErpMessage $erpMessage): Response
    {
        return $this->render('erp_message/show.html.twig', [
            'erp_message' => $erpMessage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_message_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpMessage $erpMessage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpMessageType::class, $erpMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_message/edit.html.twig', [
            'erp_message' => $erpMessage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_message_delete', methods: ['POST'])]
    public function delete(Request $request, ErpMessage $erpMessage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpMessage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpMessage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_message_index', [], Response::HTTP_SEE_OTHER);
    }
}
