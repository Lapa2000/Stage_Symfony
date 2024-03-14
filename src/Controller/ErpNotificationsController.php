<?php

namespace App\Controller;

use App\Entity\ErpNotifications;
use App\Form\ErpNotificationsType;
use App\Repository\ErpNotificationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/notifications')]
class ErpNotificationsController extends AbstractController
{
    #[Route('/', name: 'app_erp_notifications_index', methods: ['GET'])]
    public function index(ErpNotificationsRepository $erpNotificationsRepository): Response
    {
        return $this->render('erp_notifications/index.html.twig', [
            'erp_notifications' => $erpNotificationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_notifications_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpNotification = new ErpNotifications();
        $form = $this->createForm(ErpNotificationsType::class, $erpNotification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpNotification);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_notifications_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_notifications/new.html.twig', [
            'erp_notification' => $erpNotification,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_notifications_show', methods: ['GET'])]
    public function show(ErpNotifications $erpNotification): Response
    {
        return $this->render('erp_notifications/show.html.twig', [
            'erp_notification' => $erpNotification,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_notifications_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpNotifications $erpNotification, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpNotificationsType::class, $erpNotification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_notifications_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_notifications/edit.html.twig', [
            'erp_notification' => $erpNotification,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_notifications_delete', methods: ['POST'])]
    public function delete(Request $request, ErpNotifications $erpNotification, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpNotification->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpNotification);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_notifications_index', [], Response::HTTP_SEE_OTHER);
    }
}
