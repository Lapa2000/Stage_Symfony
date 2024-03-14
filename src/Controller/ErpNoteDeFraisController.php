<?php

namespace App\Controller;

use App\Entity\ErpNoteDeFrais;
use App\Form\ErpNoteDeFraisType;
use App\Repository\ErpNoteDeFraisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/note/de/frais')]
class ErpNoteDeFraisController extends AbstractController
{
    #[Route('/', name: 'app_erp_note_de_frais_index', methods: ['GET'])]
    public function index(ErpNoteDeFraisRepository $erpNoteDeFraisRepository): Response
    {
        return $this->render('erp_note_de_frais/index.html.twig', [
            'erp_note_de_frais' => $erpNoteDeFraisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_note_de_frais_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpNoteDeFrai = new ErpNoteDeFrais();
        $form = $this->createForm(ErpNoteDeFraisType::class, $erpNoteDeFrai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpNoteDeFrai);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_note_de_frais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_note_de_frais/new.html.twig', [
            'erp_note_de_frai' => $erpNoteDeFrai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_note_de_frais_show', methods: ['GET'])]
    public function show(ErpNoteDeFrais $erpNoteDeFrai): Response
    {
        return $this->render('erp_note_de_frais/show.html.twig', [
            'erp_note_de_frai' => $erpNoteDeFrai,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_note_de_frais_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpNoteDeFrais $erpNoteDeFrai, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpNoteDeFraisType::class, $erpNoteDeFrai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_note_de_frais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_note_de_frais/edit.html.twig', [
            'erp_note_de_frai' => $erpNoteDeFrai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_note_de_frais_delete', methods: ['POST'])]
    public function delete(Request $request, ErpNoteDeFrais $erpNoteDeFrai, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpNoteDeFrai->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpNoteDeFrai);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_note_de_frais_index', [], Response::HTTP_SEE_OTHER);
    }
}
