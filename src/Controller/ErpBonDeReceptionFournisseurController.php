<?php

namespace App\Controller;

use App\Entity\ErpBonDeReceptionFournisseur;
use App\Form\ErpBonDeReceptionFournisseurType;
use App\Repository\ErpBonDeReceptionFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/bon/de/reception/fournisseur')]
class ErpBonDeReceptionFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_erp_bon_de_reception_fournisseur_index', methods: ['GET'])]
    public function index(ErpBonDeReceptionFournisseurRepository $erpBonDeReceptionFournisseurRepository): Response
    {
        return $this->render('erp_bon_de_reception_fournisseur/index.html.twig', [
            'erp_bon_de_reception_fournisseurs' => $erpBonDeReceptionFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_bon_de_reception_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpBonDeReceptionFournisseur = new ErpBonDeReceptionFournisseur();
        $form = $this->createForm(ErpBonDeReceptionFournisseurType::class, $erpBonDeReceptionFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpBonDeReceptionFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_bon_de_reception_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_bon_de_reception_fournisseur/new.html.twig', [
            'erp_bon_de_reception_fournisseur' => $erpBonDeReceptionFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_bon_de_reception_fournisseur_show', methods: ['GET'])]
    public function show(ErpBonDeReceptionFournisseur $erpBonDeReceptionFournisseur): Response
    {
        return $this->render('erp_bon_de_reception_fournisseur/show.html.twig', [
            'erp_bon_de_reception_fournisseur' => $erpBonDeReceptionFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_bon_de_reception_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpBonDeReceptionFournisseur $erpBonDeReceptionFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpBonDeReceptionFournisseurType::class, $erpBonDeReceptionFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_bon_de_reception_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_bon_de_reception_fournisseur/edit.html.twig', [
            'erp_bon_de_reception_fournisseur' => $erpBonDeReceptionFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_bon_de_reception_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, ErpBonDeReceptionFournisseur $erpBonDeReceptionFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpBonDeReceptionFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpBonDeReceptionFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_bon_de_reception_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
