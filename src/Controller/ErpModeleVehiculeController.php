<?php

namespace App\Controller;

use App\Entity\ErpModeleVehicule;
use App\Form\ErpModeleVehiculeType;
use App\Repository\ErpModeleVehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/modele/vehicule')]
class ErpModeleVehiculeController extends AbstractController
{
    #[Route('/', name: 'app_erp_modele_vehicule_index', methods: ['GET'])]
    public function index(ErpModeleVehiculeRepository $erpModeleVehiculeRepository): Response
    {
        return $this->render('erp_modele_vehicule/index.html.twig', [
            'erp_modele_vehicules' => $erpModeleVehiculeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_modele_vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpModeleVehicule = new ErpModeleVehicule();
        $form = $this->createForm(ErpModeleVehiculeType::class, $erpModeleVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpModeleVehicule);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_modele_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_modele_vehicule/new.html.twig', [
            'erp_modele_vehicule' => $erpModeleVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_modele_vehicule_show', methods: ['GET'])]
    public function show(ErpModeleVehicule $erpModeleVehicule): Response
    {
        return $this->render('erp_modele_vehicule/show.html.twig', [
            'erp_modele_vehicule' => $erpModeleVehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_modele_vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpModeleVehicule $erpModeleVehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpModeleVehiculeType::class, $erpModeleVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_modele_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_modele_vehicule/edit.html.twig', [
            'erp_modele_vehicule' => $erpModeleVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_modele_vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, ErpModeleVehicule $erpModeleVehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpModeleVehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpModeleVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_modele_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }
}
