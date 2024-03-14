<?php

namespace App\Controller;

use App\Entity\ErpObjectifs;
use App\Form\ErpObjectifsType;
use App\Repository\ErpObjectifsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/objectifs')]
class ErpObjectifsController extends AbstractController
{
    #[Route('/', name: 'app_erp_objectifs_index', methods: ['GET'])]
    public function index(ErpObjectifsRepository $erpObjectifsRepository): Response
    {
        return $this->render('erp_objectifs/index.html.twig', [
            'erp_objectifs' => $erpObjectifsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_objectifs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpObjectif = new ErpObjectifs();
        $form = $this->createForm(ErpObjectifsType::class, $erpObjectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpObjectif);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_objectifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_objectifs/new.html.twig', [
            'erp_objectif' => $erpObjectif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_objectifs_show', methods: ['GET'])]
    public function show(ErpObjectifs $erpObjectif): Response
    {
        return $this->render('erp_objectifs/show.html.twig', [
            'erp_objectif' => $erpObjectif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_objectifs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpObjectifs $erpObjectif, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpObjectifsType::class, $erpObjectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_objectifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_objectifs/edit.html.twig', [
            'erp_objectif' => $erpObjectif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_objectifs_delete', methods: ['POST'])]
    public function delete(Request $request, ErpObjectifs $erpObjectif, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpObjectif->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpObjectif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_objectifs_index', [], Response::HTTP_SEE_OTHER);
    }
}
