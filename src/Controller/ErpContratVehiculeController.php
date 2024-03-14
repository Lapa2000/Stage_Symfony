<?php

namespace App\Controller;

use App\Entity\ErpContratVehicule;
use App\Form\ErpContratVehiculeType;
use App\Repository\ErpContratVehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/contrat/vehicule')]
class ErpContratVehiculeController extends AbstractController
{
    #[Route('/', name: 'app_erp_contrat_vehicule_index', methods: ['GET'])]
    public function index(ErpContratVehiculeRepository $erpContratVehiculeRepository): Response
    {
        return $this->render('erp_contrat_vehicule/index.html.twig', [
            'erp_contrat_vehicules' => $erpContratVehiculeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_contrat_vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpContratVehicule = new ErpContratVehicule();
        $form = $this->createForm(ErpContratVehiculeType::class, $erpContratVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpContratVehicule);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contrat_vehicule/new.html.twig', [
            'erp_contrat_vehicule' => $erpContratVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contrat_vehicule_show', methods: ['GET'])]
    public function show(ErpContratVehicule $erpContratVehicule): Response
    {
        return $this->render('erp_contrat_vehicule/show.html.twig', [
            'erp_contrat_vehicule' => $erpContratVehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_contrat_vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpContratVehicule $erpContratVehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpContratVehiculeType::class, $erpContratVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contrat_vehicule/edit.html.twig', [
            'erp_contrat_vehicule' => $erpContratVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contrat_vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, ErpContratVehicule $erpContratVehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpContratVehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpContratVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }
}
