<?php

namespace App\Controller;

use App\Entity\ErpAdmin;
use App\Form\ErpAdminType;
use App\Repository\ErpAdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/admin')]
class ErpAdminController extends AbstractController
{
    #[Route('/', name: 'app_erp_admin_index', methods: ['GET'])]
    public function index(ErpAdminRepository $erpAdminRepository): Response
    {
        return $this->render('erp_admin/index.html.twig', [
            'erp_admins' => $erpAdminRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpAdmin = new ErpAdmin();
        $form = $this->createForm(ErpAdminType::class, $erpAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_admin/new.html.twig', [
            'erp_admin' => $erpAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_admin_show', methods: ['GET'])]
    public function show(ErpAdmin $erpAdmin): Response
    {
        return $this->render('erp_admin/show.html.twig', [
            'erp_admin' => $erpAdmin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpAdmin $erpAdmin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpAdminType::class, $erpAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_admin/edit.html.twig', [
            'erp_admin' => $erpAdmin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_admin_delete', methods: ['POST'])]
    public function delete(Request $request, ErpAdmin $erpAdmin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpAdmin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
