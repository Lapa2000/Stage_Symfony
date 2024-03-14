<?php

namespace App\Controller;

use App\Entity\ErpChauffeurs;
use App\Form\ErpChauffeursType;
use App\Repository\ErpChauffeursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/chauffeurs')]
class ErpChauffeursController extends AbstractController
{
    #[Route('/', name: 'app_erp_chauffeurs_index', methods: ['GET'])]
    public function index(ErpChauffeursRepository $erpChauffeursRepository): Response
    {
        return $this->render('erp_chauffeurs/index.html.twig', [
            'erp_chauffeurs' => $erpChauffeursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_chauffeurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpChauffeur = new ErpChauffeurs();
        $form = $this->createForm(ErpChauffeursType::class, $erpChauffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpChauffeur);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_chauffeurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_chauffeurs/new.html.twig', [
            'erp_chauffeur' => $erpChauffeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_chauffeurs_show', methods: ['GET'])]
    public function show(ErpChauffeurs $erpChauffeur): Response
    {
        return $this->render('erp_chauffeurs/show.html.twig', [
            'erp_chauffeur' => $erpChauffeur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_chauffeurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpChauffeurs $erpChauffeur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpChauffeursType::class, $erpChauffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_chauffeurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_chauffeurs/edit.html.twig', [
            'erp_chauffeur' => $erpChauffeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_chauffeurs_delete', methods: ['POST'])]
    public function delete(Request $request, ErpChauffeurs $erpChauffeur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpChauffeur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpChauffeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_chauffeurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
