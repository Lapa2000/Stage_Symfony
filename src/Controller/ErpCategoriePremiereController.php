<?php

namespace App\Controller;

use App\Entity\ErpCategoriePremiere;
use App\Form\ErpCategoriePremiereType;
use App\Repository\ErpCategoriePremiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/categorie/premiere')]
class ErpCategoriePremiereController extends AbstractController
{
    #[Route('/', name: 'app_erp_categorie_premiere_index', methods: ['GET'])]
    public function index(ErpCategoriePremiereRepository $erpCategoriePremiereRepository): Response
    {
        return $this->render('erp_categorie_premiere/index.html.twig', [
            'erp_categorie_premieres' => $erpCategoriePremiereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_categorie_premiere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpCategoriePremiere = new ErpCategoriePremiere();
        $form = $this->createForm(ErpCategoriePremiereType::class, $erpCategoriePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpCategoriePremiere);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_categorie_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_categorie_premiere/new.html.twig', [
            'erp_categorie_premiere' => $erpCategoriePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_categorie_premiere_show', methods: ['GET'])]
    public function show(ErpCategoriePremiere $erpCategoriePremiere): Response
    {
        return $this->render('erp_categorie_premiere/show.html.twig', [
            'erp_categorie_premiere' => $erpCategoriePremiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_categorie_premiere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpCategoriePremiere $erpCategoriePremiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpCategoriePremiereType::class, $erpCategoriePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_categorie_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_categorie_premiere/edit.html.twig', [
            'erp_categorie_premiere' => $erpCategoriePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_categorie_premiere_delete', methods: ['POST'])]
    public function delete(Request $request, ErpCategoriePremiere $erpCategoriePremiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpCategoriePremiere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpCategoriePremiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_categorie_premiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
