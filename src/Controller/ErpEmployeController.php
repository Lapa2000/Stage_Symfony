<?php

namespace App\Controller;

use App\Entity\ErpEmploye;
use App\Form\ErpEmployeType;
use App\Repository\ErpEmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/employe')]
class ErpEmployeController extends AbstractController
{
    #[Route('/', name: 'app_erp_employe_index', methods: ['GET'])]
    public function index(ErpEmployeRepository $erpEmployeRepository): Response
    {
        return $this->render('erp_employe/index.html.twig', [
            'erp_employes' => $erpEmployeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_employe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpEmploye = new ErpEmploye();
        $form = $this->createForm(ErpEmployeType::class, $erpEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpEmploye);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_employe/new.html.twig', [
            'erp_employe' => $erpEmploye,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_employe_show', methods: ['GET'])]
    public function show(ErpEmploye $erpEmploye): Response
    {
        return $this->render('erp_employe/show.html.twig', [
            'erp_employe' => $erpEmploye,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_employe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpEmploye $erpEmploye, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpEmployeType::class, $erpEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_employe/edit.html.twig', [
            'erp_employe' => $erpEmploye,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_employe_delete', methods: ['POST'])]
    public function delete(Request $request, ErpEmploye $erpEmploye, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpEmploye->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpEmploye);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_employe_index', [], Response::HTTP_SEE_OTHER);
    }
}
