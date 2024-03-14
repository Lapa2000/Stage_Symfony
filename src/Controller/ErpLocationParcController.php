<?php

namespace App\Controller;

use App\Entity\ErpLocationParc;
use App\Form\ErpLocationParcType;
use App\Repository\ErpLocationParcRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/location/parc')]
class ErpLocationParcController extends AbstractController
{
    #[Route('/', name: 'app_erp_location_parc_index', methods: ['GET'])]
    public function index(ErpLocationParcRepository $erpLocationParcRepository): Response
    {
        return $this->render('erp_location_parc/index.html.twig', [
            'erp_location_parcs' => $erpLocationParcRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_location_parc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpLocationParc = new ErpLocationParc();
        $form = $this->createForm(ErpLocationParcType::class, $erpLocationParc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpLocationParc);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_location_parc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_location_parc/new.html.twig', [
            'erp_location_parc' => $erpLocationParc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_location_parc_show', methods: ['GET'])]
    public function show(ErpLocationParc $erpLocationParc): Response
    {
        return $this->render('erp_location_parc/show.html.twig', [
            'erp_location_parc' => $erpLocationParc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_location_parc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpLocationParc $erpLocationParc, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpLocationParcType::class, $erpLocationParc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_location_parc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_location_parc/edit.html.twig', [
            'erp_location_parc' => $erpLocationParc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_location_parc_delete', methods: ['POST'])]
    public function delete(Request $request, ErpLocationParc $erpLocationParc, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpLocationParc->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpLocationParc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_location_parc_index', [], Response::HTTP_SEE_OTHER);
    }
}
