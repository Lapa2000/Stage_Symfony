<?php

namespace App\Controller;

use App\Entity\ErpAbsence;
use App\Form\ErpAbsenceType;
use App\Repository\ErpAbsenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/absence')]
class ErpAbsenceController extends AbstractController
{
    #[Route('/', name: 'app_erp_absence_index', methods: ['GET'])]
    public function index(ErpAbsenceRepository $erpAbsenceRepository): Response
    {
        return $this->render('erp_absence/index.html.twig', [
            'erp_absences' => $erpAbsenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_absence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpAbsence = new ErpAbsence();
        $form = $this->createForm(ErpAbsenceType::class, $erpAbsence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpAbsence);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_absence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_absence/new.html.twig', [
            'erp_absence' => $erpAbsence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_absence_show', methods: ['GET'])]
    public function show(ErpAbsence $erpAbsence): Response
    {
        return $this->render('erp_absence/show.html.twig', [
            'erp_absence' => $erpAbsence,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_absence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpAbsence $erpAbsence, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpAbsenceType::class, $erpAbsence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_absence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_absence/edit.html.twig', [
            'erp_absence' => $erpAbsence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_absence_delete', methods: ['POST'])]
    public function delete(Request $request, ErpAbsence $erpAbsence, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpAbsence->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpAbsence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_absence_index', [], Response::HTTP_SEE_OTHER);
    }
}
