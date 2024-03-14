<?php

namespace App\Controller;

use App\Entity\ErpProjet;
use App\Form\ErpProjetType;
use App\Repository\ErpProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/projet')]
class ErpProjetController extends AbstractController
{
    #[Route('/', name: 'app_erp_projet_index', methods: ['GET'])]
    public function index(ErpProjetRepository $erpProjetRepository): Response
    {
        return $this->render('erp_projet/index.html.twig', [
            'erp_projets' => $erpProjetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_projet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpProjet = new ErpProjet();
        $form = $this->createForm(ErpProjetType::class, $erpProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpProjet);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_projet/new.html.twig', [
            'erp_projet' => $erpProjet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_projet_show', methods: ['GET'])]
    public function show(ErpProjet $erpProjet): Response
    {
        return $this->render('erp_projet/show.html.twig', [
            'erp_projet' => $erpProjet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_projet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpProjet $erpProjet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpProjetType::class, $erpProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_projet/edit.html.twig', [
            'erp_projet' => $erpProjet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_projet_delete', methods: ['POST'])]
    public function delete(Request $request, ErpProjet $erpProjet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpProjet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_projet_index', [], Response::HTTP_SEE_OTHER);
    }
}
