<?php

namespace App\Controller;

use App\Entity\CommandeFournisseurNew;
use App\Form\CommandeFournisseurNewType;
use App\Repository\CommandeFournisseurNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commande/fournisseur/new')]
class CommandeFournisseurNewController extends AbstractController
{
    #[Route('/', name: 'app_commande_fournisseur_new_index', methods: ['GET'])]
    public function index(CommandeFournisseurNewRepository $commandeFournisseurNewRepository): Response
    {
        return $this->render('commande_fournisseur_new/index.html.twig', [
            'commande_fournisseur_news' => $commandeFournisseurNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commande_fournisseur_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commandeFournisseurNew = new CommandeFournisseurNew();
        $form = $this->createForm(CommandeFournisseurNewType::class, $commandeFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commandeFournisseurNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_fournisseur_new/new.html.twig', [
            'commande_fournisseur_new' => $commandeFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_fournisseur_new_show', methods: ['GET'])]
    public function show(CommandeFournisseurNew $commandeFournisseurNew): Response
    {
        return $this->render('commande_fournisseur_new/show.html.twig', [
            'commande_fournisseur_new' => $commandeFournisseurNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_fournisseur_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommandeFournisseurNew $commandeFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommandeFournisseurNewType::class, $commandeFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_fournisseur_new/edit.html.twig', [
            'commande_fournisseur_new' => $commandeFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_fournisseur_new_delete', methods: ['POST'])]
    public function delete(Request $request, CommandeFournisseurNew $commandeFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandeFournisseurNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commandeFournisseurNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commande_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
