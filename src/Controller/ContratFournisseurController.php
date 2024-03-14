<?php

namespace App\Controller;

use App\Entity\ContratFournisseur;
use App\Form\ContratFournisseurType;
use App\Repository\ContratFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contrat/fournisseur')]
class ContratFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_contrat_fournisseur_index', methods: ['GET'])]
    public function index(ContratFournisseurRepository $contratFournisseurRepository): Response
    {
        return $this->render('contrat_fournisseur/index.html.twig', [
            'contrat_fournisseurs' => $contratFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contrat_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contratFournisseur = new ContratFournisseur();
        $form = $this->createForm(ContratFournisseurType::class, $contratFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contratFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat_fournisseur/new.html.twig', [
            'contrat_fournisseur' => $contratFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_fournisseur_show', methods: ['GET'])]
    public function show(ContratFournisseur $contratFournisseur): Response
    {
        return $this->render('contrat_fournisseur/show.html.twig', [
            'contrat_fournisseur' => $contratFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratFournisseur $contratFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratFournisseurType::class, $contratFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat_fournisseur/edit.html.twig', [
            'contrat_fournisseur' => $contratFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, ContratFournisseur $contratFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contratFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
