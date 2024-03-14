<?php

namespace App\Controller;

use App\Entity\DevisFournisseurNew;
use App\Form\DevisFournisseurNewType;
use App\Repository\DevisFournisseurNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/devis/fournisseur/new')]
class DevisFournisseurNewController extends AbstractController
{
    #[Route('/', name: 'app_devis_fournisseur_new_index', methods: ['GET'])]
    public function index(DevisFournisseurNewRepository $devisFournisseurNewRepository): Response
    {
        return $this->render('devis_fournisseur_new/index.html.twig', [
            'devis_fournisseur_news' => $devisFournisseurNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_devis_fournisseur_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $devisFournisseurNew = new DevisFournisseurNew();
        $form = $this->createForm(DevisFournisseurNewType::class, $devisFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($devisFournisseurNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('devis_fournisseur_new/new.html.twig', [
            'devis_fournisseur_new' => $devisFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_devis_fournisseur_new_show', methods: ['GET'])]
    public function show(DevisFournisseurNew $devisFournisseurNew): Response
    {
        return $this->render('devis_fournisseur_new/show.html.twig', [
            'devis_fournisseur_new' => $devisFournisseurNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_devis_fournisseur_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DevisFournisseurNew $devisFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DevisFournisseurNewType::class, $devisFournisseurNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('devis_fournisseur_new/edit.html.twig', [
            'devis_fournisseur_new' => $devisFournisseurNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_devis_fournisseur_new_delete', methods: ['POST'])]
    public function delete(Request $request, DevisFournisseurNew $devisFournisseurNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devisFournisseurNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($devisFournisseurNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_devis_fournisseur_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
