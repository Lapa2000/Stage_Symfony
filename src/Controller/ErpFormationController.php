<?php

namespace App\Controller;

use App\Entity\ErpFormation;
use App\Form\ErpFormationType;
use App\Repository\ErpFormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/formation')]
class ErpFormationController extends AbstractController
{
    #[Route('/', name: 'app_erp_formation_index', methods: ['GET'])]
    public function index(ErpFormationRepository $erpFormationRepository): Response
    {
        return $this->render('erp_formation/index.html.twig', [
            'erp_formations' => $erpFormationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpFormation = new ErpFormation();
        $form = $this->createForm(ErpFormationType::class, $erpFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpFormation);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_formation/new.html.twig', [
            'erp_formation' => $erpFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_formation_show', methods: ['GET'])]
    public function show(ErpFormation $erpFormation): Response
    {
        return $this->render('erp_formation/show.html.twig', [
            'erp_formation' => $erpFormation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpFormation $erpFormation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpFormationType::class, $erpFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_formation/edit.html.twig', [
            'erp_formation' => $erpFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_formation_delete', methods: ['POST'])]
    public function delete(Request $request, ErpFormation $erpFormation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpFormation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpFormation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
