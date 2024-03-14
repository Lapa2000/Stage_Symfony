<?php

namespace App\Controller;

use App\Entity\ErpEquipe;
use App\Form\ErpEquipeType;
use App\Repository\ErpEquipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/equipe')]
class ErpEquipeController extends AbstractController
{
    #[Route('/', name: 'app_erp_equipe_index', methods: ['GET'])]
    public function index(ErpEquipeRepository $erpEquipeRepository): Response
    {
        return $this->render('erp_equipe/index.html.twig', [
            'erp_equipes' => $erpEquipeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_equipe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpEquipe = new ErpEquipe();
        $form = $this->createForm(ErpEquipeType::class, $erpEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpEquipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_equipe/new.html.twig', [
            'erp_equipe' => $erpEquipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_equipe_show', methods: ['GET'])]
    public function show(ErpEquipe $erpEquipe): Response
    {
        return $this->render('erp_equipe/show.html.twig', [
            'erp_equipe' => $erpEquipe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_equipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpEquipe $erpEquipe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpEquipeType::class, $erpEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_equipe/edit.html.twig', [
            'erp_equipe' => $erpEquipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_equipe_delete', methods: ['POST'])]
    public function delete(Request $request, ErpEquipe $erpEquipe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpEquipe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpEquipe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_equipe_index', [], Response::HTTP_SEE_OTHER);
    }
}
