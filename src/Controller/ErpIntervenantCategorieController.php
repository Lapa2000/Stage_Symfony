<?php

namespace App\Controller;

use App\Entity\ErpIntervenantCategorie;
use App\Form\ErpIntervenantCategorieType;
use App\Repository\ErpIntervenantCategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/intervenant/categorie')]
class ErpIntervenantCategorieController extends AbstractController
{
    #[Route('/', name: 'app_erp_intervenant_categorie_index', methods: ['GET'])]
    public function index(ErpIntervenantCategorieRepository $erpIntervenantCategorieRepository): Response
    {
        return $this->render('erp_intervenant_categorie/index.html.twig', [
            'erp_intervenant_categories' => $erpIntervenantCategorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_intervenant_categorie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpIntervenantCategorie = new ErpIntervenantCategorie();
        $form = $this->createForm(ErpIntervenantCategorieType::class, $erpIntervenantCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpIntervenantCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_intervenant_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_intervenant_categorie/new.html.twig', [
            'erp_intervenant_categorie' => $erpIntervenantCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_intervenant_categorie_show', methods: ['GET'])]
    public function show(ErpIntervenantCategorie $erpIntervenantCategorie): Response
    {
        return $this->render('erp_intervenant_categorie/show.html.twig', [
            'erp_intervenant_categorie' => $erpIntervenantCategorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_intervenant_categorie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpIntervenantCategorie $erpIntervenantCategorie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpIntervenantCategorieType::class, $erpIntervenantCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_intervenant_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_intervenant_categorie/edit.html.twig', [
            'erp_intervenant_categorie' => $erpIntervenantCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_intervenant_categorie_delete', methods: ['POST'])]
    public function delete(Request $request, ErpIntervenantCategorie $erpIntervenantCategorie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpIntervenantCategorie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpIntervenantCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_intervenant_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
