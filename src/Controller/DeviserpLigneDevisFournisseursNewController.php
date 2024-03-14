<?php

namespace App\Controller;

use App\Entity\DeviserpLigneDevisFournisseursNew;
use App\Form\DeviserpLigneDevisFournisseursNewType;
use App\Repository\DeviserpLigneDevisFournisseursNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/deviserp/ligne/devis/fournisseurs/new')]
class DeviserpLigneDevisFournisseursNewController extends AbstractController
{
    #[Route('/', name: 'app_deviserp_ligne_devis_fournisseurs_new_index', methods: ['GET'])]
    public function index(DeviserpLigneDevisFournisseursNewRepository $deviserpLigneDevisFournisseursNewRepository): Response
    {
        return $this->render('deviserp_ligne_devis_fournisseurs_new/index.html.twig', [
            'deviserp_ligne_devis_fournisseurs_news' => $deviserpLigneDevisFournisseursNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_deviserp_ligne_devis_fournisseurs_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $deviserpLigneDevisFournisseursNew = new DeviserpLigneDevisFournisseursNew();
        $form = $this->createForm(DeviserpLigneDevisFournisseursNewType::class, $deviserpLigneDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($deviserpLigneDevisFournisseursNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_deviserp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('deviserp_ligne_devis_fournisseurs_new/new.html.twig', [
            'deviserp_ligne_devis_fournisseurs_new' => $deviserpLigneDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_deviserp_ligne_devis_fournisseurs_new_show', methods: ['GET'])]
    public function show(DeviserpLigneDevisFournisseursNew $deviserpLigneDevisFournisseursNew): Response
    {
        return $this->render('deviserp_ligne_devis_fournisseurs_new/show.html.twig', [
            'deviserp_ligne_devis_fournisseurs_new' => $deviserpLigneDevisFournisseursNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_deviserp_ligne_devis_fournisseurs_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DeviserpLigneDevisFournisseursNew $deviserpLigneDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeviserpLigneDevisFournisseursNewType::class, $deviserpLigneDevisFournisseursNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_deviserp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('deviserp_ligne_devis_fournisseurs_new/edit.html.twig', [
            'deviserp_ligne_devis_fournisseurs_new' => $deviserpLigneDevisFournisseursNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_deviserp_ligne_devis_fournisseurs_new_delete', methods: ['POST'])]
    public function delete(Request $request, DeviserpLigneDevisFournisseursNew $deviserpLigneDevisFournisseursNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deviserpLigneDevisFournisseursNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($deviserpLigneDevisFournisseursNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_deviserp_ligne_devis_fournisseurs_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
