<?php

namespace App\Controller;

use App\Entity\ErpHeureSupp;
use App\Form\ErpHeureSuppType;
use App\Repository\ErpHeureSuppRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/heure/supp')]
class ErpHeureSuppController extends AbstractController
{
    #[Route('/', name: 'app_erp_heure_supp_index', methods: ['GET'])]
    public function index(ErpHeureSuppRepository $erpHeureSuppRepository): Response
    {
        return $this->render('erp_heure_supp/index.html.twig', [
            'erp_heure_supps' => $erpHeureSuppRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_heure_supp_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpHeureSupp = new ErpHeureSupp();
        $form = $this->createForm(ErpHeureSuppType::class, $erpHeureSupp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpHeureSupp);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_heure_supp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_heure_supp/new.html.twig', [
            'erp_heure_supp' => $erpHeureSupp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_heure_supp_show', methods: ['GET'])]
    public function show(ErpHeureSupp $erpHeureSupp): Response
    {
        return $this->render('erp_heure_supp/show.html.twig', [
            'erp_heure_supp' => $erpHeureSupp,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_heure_supp_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpHeureSupp $erpHeureSupp, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpHeureSuppType::class, $erpHeureSupp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_heure_supp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_heure_supp/edit.html.twig', [
            'erp_heure_supp' => $erpHeureSupp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_heure_supp_delete', methods: ['POST'])]
    public function delete(Request $request, ErpHeureSupp $erpHeureSupp, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpHeureSupp->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpHeureSupp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_heure_supp_index', [], Response::HTTP_SEE_OTHER);
    }
}
