<?php

namespace App\Controller;

use App\Entity\ErpTypeMatierePremiere;
use App\Form\ErpTypeMatierePremiereType;
use App\Repository\ErpTypeMatierePremiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/type/matiere/premiere')]
class ErpTypeMatierePremiereController extends AbstractController
{
    #[Route('/', name: 'app_erp_type_matiere_premiere_index', methods: ['GET'])]
    public function index(ErpTypeMatierePremiereRepository $erpTypeMatierePremiereRepository): Response
    {
        return $this->render('erp_type_matiere_premiere/index.html.twig', [
            'erp_type_matiere_premieres' => $erpTypeMatierePremiereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_type_matiere_premiere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpTypeMatierePremiere = new ErpTypeMatierePremiere();
        $form = $this->createForm(ErpTypeMatierePremiereType::class, $erpTypeMatierePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpTypeMatierePremiere);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_type_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_type_matiere_premiere/new.html.twig', [
            'erp_type_matiere_premiere' => $erpTypeMatierePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_type_matiere_premiere_show', methods: ['GET'])]
    public function show(ErpTypeMatierePremiere $erpTypeMatierePremiere): Response
    {
        return $this->render('erp_type_matiere_premiere/show.html.twig', [
            'erp_type_matiere_premiere' => $erpTypeMatierePremiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_type_matiere_premiere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpTypeMatierePremiere $erpTypeMatierePremiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpTypeMatierePremiereType::class, $erpTypeMatierePremiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_type_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_type_matiere_premiere/edit.html.twig', [
            'erp_type_matiere_premiere' => $erpTypeMatierePremiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_type_matiere_premiere_delete', methods: ['POST'])]
    public function delete(Request $request, ErpTypeMatierePremiere $erpTypeMatierePremiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpTypeMatierePremiere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpTypeMatierePremiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_type_matiere_premiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
