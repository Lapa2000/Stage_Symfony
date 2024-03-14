<?php

namespace App\Controller;

use App\Entity\DevisFournisseurs;
use App\Form\DevisFournisseursType;
use App\Repository\DevisFournisseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/devis/fournisseurs')]
class DevisFournisseursController extends AbstractController
{
    #[Route('/', name: 'app_devis_fournisseurs_index', methods: ['GET'])]
    public function index(DevisFournisseursRepository $devisFournisseursRepository): Response
    {
        return $this->render('devis_fournisseurs/index.html.twig', [
            'devis_fournisseurs' => $devisFournisseursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_devis_fournisseurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $devisFournisseur = new DevisFournisseurs();
        $form = $this->createForm(DevisFournisseursType::class, $devisFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($devisFournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('devis_fournisseurs/new.html.twig', [
            'devis_fournisseur' => $devisFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_devis_fournisseurs_show', methods: ['GET'])]
    public function show(DevisFournisseurs $devisFournisseur): Response
    {
        return $this->render('devis_fournisseurs/show.html.twig', [
            'devis_fournisseur' => $devisFournisseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_devis_fournisseurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DevisFournisseurs $devisFournisseur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DevisFournisseursType::class, $devisFournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('devis_fournisseurs/edit.html.twig', [
            'devis_fournisseur' => $devisFournisseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_devis_fournisseurs_delete', methods: ['POST'])]
    public function delete(Request $request, DevisFournisseurs $devisFournisseur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devisFournisseur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($devisFournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_devis_fournisseurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
