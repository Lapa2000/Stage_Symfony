<?php

namespace App\Controller;

use App\Entity\ErpMatierePremiere;
use App\Form\ErpMatierePremiereType;
use App\Repository\ErpMatierePremiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/matiere/premiere')]
class ErpMatierePremiereController extends AbstractController
{
    #[Route('/', name: 'app_erp_matiere_premiere_index', methods: ['GET'])]
    public function index(ErpMatierePremiereRepository $erpMatierePremiereRepository): Response
    {
        return $this->render('erp_matiere_premiere/index.html.twig', [
            'erp_matiere_premieres' => $erpMatierePremiereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_matiere_premiere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpMatierePremiere = new ErpMatierePremiere();
        $form = $this->createForm(ErpMatierePremiereType::class, $erpMatierePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpMatierePremiere);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_matiere_premiere/new.html.twig', [
            'erp_matiere_premiere' => $erpMatierePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_matiere_premiere_show', methods: ['GET'])]
    public function show(ErpMatierePremiere $erpMatierePremiere): Response
    {
        return $this->render('erp_matiere_premiere/show.html.twig', [
            'erp_matiere_premiere' => $erpMatierePremiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_matiere_premiere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpMatierePremiere $erpMatierePremiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpMatierePremiereType::class, $erpMatierePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_matiere_premiere/edit.html.twig', [
            'erp_matiere_premiere' => $erpMatierePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_matiere_premiere_delete', methods: ['POST'])]
    public function delete(Request $request, ErpMatierePremiere $erpMatierePremiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpMatierePremiere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpMatierePremiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
