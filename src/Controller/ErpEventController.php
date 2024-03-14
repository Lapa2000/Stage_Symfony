<?php

namespace App\Controller;

use App\Entity\ErpEvent;
use App\Form\ErpEventType;
use App\Repository\ErpEventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/event')]
class ErpEventController extends AbstractController
{
    #[Route('/', name: 'app_erp_event_index', methods: ['GET'])]
    public function index(ErpEventRepository $erpEventRepository): Response
    {
        return $this->render('erp_event/index.html.twig', [
            'erp_events' => $erpEventRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_event_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpEvent = new ErpEvent();
        $form = $this->createForm(ErpEventType::class, $erpEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpEvent);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_event/new.html.twig', [
            'erp_event' => $erpEvent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_event_show', methods: ['GET'])]
    public function show(ErpEvent $erpEvent): Response
    {
        return $this->render('erp_event/show.html.twig', [
            'erp_event' => $erpEvent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_event_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpEvent $erpEvent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpEventType::class, $erpEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_event/edit.html.twig', [
            'erp_event' => $erpEvent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_event_delete', methods: ['POST'])]
    public function delete(Request $request, ErpEvent $erpEvent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpEvent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpEvent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_event_index', [], Response::HTTP_SEE_OTHER);
    }
}
