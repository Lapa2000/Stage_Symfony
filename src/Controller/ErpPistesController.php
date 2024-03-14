<?php

namespace App\Controller;

use App\Entity\ErpPistes;
use App\Form\ErpPistesType;
use App\Repository\ErpPistesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/pistes')]
class ErpPistesController extends AbstractController
{
    #[Route('/', name: 'app_erp_pistes_index', methods: ['GET'])]
    public function index(ErpPistesRepository $erpPistesRepository): Response
    {
        return $this->render('erp_pistes/index.html.twig', [
            'erp_pistes' => $erpPistesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_pistes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpPiste = new ErpPistes();
        $form = $this->createForm(ErpPistesType::class, $erpPiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpPiste);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_pistes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_pistes/new.html.twig', [
            'erp_piste' => $erpPiste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_pistes_show', methods: ['GET'])]
    public function show(ErpPistes $erpPiste): Response
    {
        return $this->render('erp_pistes/show.html.twig', [
            'erp_piste' => $erpPiste,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_pistes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpPistes $erpPiste, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpPistesType::class, $erpPiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_pistes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_pistes/edit.html.twig', [
            'erp_piste' => $erpPiste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_pistes_delete', methods: ['POST'])]
    public function delete(Request $request, ErpPistes $erpPiste, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpPiste->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpPiste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_pistes_index', [], Response::HTTP_SEE_OTHER);
    }
}
