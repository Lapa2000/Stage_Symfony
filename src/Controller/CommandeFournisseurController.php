<?php

namespace App\Controller;

use App\Entity\CommandeFournisseur;
use App\Form\CommandeFournisseurType;
use App\Repository\CommandeFournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commande/fournisseur')]
class CommandeFournisseurController extends AbstractController
{
    #[Route('/', name: 'app_commande_fournisseur_index', methods: ['GET'])]
    public function index(CommandeFournisseurRepository $commandeFournisseurRepository): Response
    {
        return $this->render('commande_fournisseur/index.html.twig', [
            'commande_fournisseurs' => $commandeFournisseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commande_fournisseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commandeFournisseur = new CommandeFournisseur();
        $form = $this->createForm(CommandeFournisseurType::class, $commandeFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commandeFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_fournisseur/new.html.twig', [
            'commande_fournisseur' => $commandeFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_fournisseur_show', methods: ['GET'])]
    public function show(CommandeFournisseur $commandeFournisseur): Response
    {
        return $this->render('commande_fournisseur/show.html.twig', [
            'commande_fournisseur' => $commandeFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_fournisseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommandeFournisseur $commandeFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommandeFournisseurType::class, $commandeFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_fournisseur/edit.html.twig', [
            'commande_fournisseur' => $commandeFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_fournisseur_delete', methods: ['POST'])]
    public function delete(Request $request, CommandeFournisseur $commandeFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandeFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commandeFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commande_fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
