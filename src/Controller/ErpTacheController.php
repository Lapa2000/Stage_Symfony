<?php

namespace App\Controller;

use App\Entity\ErpTache;
use App\Form\ErpTacheType;
use App\Repository\ErpTacheRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/tache')]
class ErpTacheController extends AbstractController
{
    #[Route('/', name: 'app_erp_tache_index', methods: ['GET'])]
    public function index(ErpTacheRepository $erpTacheRepository): Response
    {
        return $this->render('erp_tache/index.html.twig', [
            'erp_taches' => $erpTacheRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_tache_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpTache = new ErpTache();
        $form = $this->createForm(ErpTacheType::class, $erpTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpTache);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_tache_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_tache/new.html.twig', [
            'erp_tache' => $erpTache,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_tache_show', methods: ['GET'])]
    public function show(ErpTache $erpTache): Response
    {
        return $this->render('erp_tache/show.html.twig', [
            'erp_tache' => $erpTache,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_tache_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpTache $erpTache, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpTacheType::class, $erpTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_tache_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_tache/edit.html.twig', [
            'erp_tache' => $erpTache,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_tache_delete', methods: ['POST'])]
    public function delete(Request $request, ErpTache $erpTache, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpTache->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpTache);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_tache_index', [], Response::HTTP_SEE_OTHER);
    }
}
