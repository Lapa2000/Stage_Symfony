<?php

namespace App\Controller;

use App\Entity\ErpContactCategorie;
use App\Form\ErpContactCategorieType;
use App\Repository\ErpContactCategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/contact/categorie')]
class ErpContactCategorieController extends AbstractController
{
    #[Route('/', name: 'app_erp_contact_categorie_index', methods: ['GET'])]
    public function index(ErpContactCategorieRepository $erpContactCategorieRepository): Response
    {
        return $this->render('erp_contact_categorie/index.html.twig', [
            'erp_contact_categories' => $erpContactCategorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_contact_categorie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpContactCategorie = new ErpContactCategorie();
        $form = $this->createForm(ErpContactCategorieType::class, $erpContactCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpContactCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contact_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contact_categorie/new.html.twig', [
            'erp_contact_categorie' => $erpContactCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contact_categorie_show', methods: ['GET'])]
    public function show(ErpContactCategorie $erpContactCategorie): Response
    {
        return $this->render('erp_contact_categorie/show.html.twig', [
            'erp_contact_categorie' => $erpContactCategorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_contact_categorie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpContactCategorie $erpContactCategorie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpContactCategorieType::class, $erpContactCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contact_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contact_categorie/edit.html.twig', [
            'erp_contact_categorie' => $erpContactCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contact_categorie_delete', methods: ['POST'])]
    public function delete(Request $request, ErpContactCategorie $erpContactCategorie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpContactCategorie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpContactCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_contact_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
