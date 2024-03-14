<?php

namespace App\Controller;

use App\Entity\ErpVehicule;
use App\Form\ErpVehiculeType;
use App\Repository\ErpVehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/vehicule')]
class ErpVehiculeController extends AbstractController
{
    #[Route('/', name: 'app_erp_vehicule_index', methods: ['GET'])]
    public function index(ErpVehiculeRepository $erpVehiculeRepository): Response
    {
        return $this->render('erp_vehicule/index.html.twig', [
            'erp_vehicules' => $erpVehiculeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpVehicule = new ErpVehicule();
        $form = $this->createForm(ErpVehiculeType::class, $erpVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpVehicule);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_vehicule/new.html.twig', [
            'erp_vehicule' => $erpVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_vehicule_show', methods: ['GET'])]
    public function show(ErpVehicule $erpVehicule): Response
    {
        return $this->render('erp_vehicule/show.html.twig', [
            'erp_vehicule' => $erpVehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpVehicule $erpVehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpVehiculeType::class, $erpVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_vehicule/edit.html.twig', [
            'erp_vehicule' => $erpVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, ErpVehicule $erpVehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpVehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }
}
