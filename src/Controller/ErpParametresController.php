<?php

namespace App\Controller;

use App\Entity\ErpParametres;
use App\Form\ErpParametresType;
use App\Repository\ErpParametresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/parametres')]
class ErpParametresController extends AbstractController
{
    #[Route('/', name: 'app_erp_parametres_index', methods: ['GET'])]
    public function index(ErpParametresRepository $erpParametresRepository): Response
    {
        return $this->render('erp_parametres/index.html.twig', [
            'erp_parametres' => $erpParametresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_parametres_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpParametre = new ErpParametres();
        $form = $this->createForm(ErpParametresType::class, $erpParametre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpParametre);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_parametres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_parametres/new.html.twig', [
            'erp_parametre' => $erpParametre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_parametres_show', methods: ['GET'])]
    public function show(ErpParametres $erpParametre): Response
    {
        return $this->render('erp_parametres/show.html.twig', [
            'erp_parametre' => $erpParametre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_parametres_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpParametres $erpParametre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpParametresType::class, $erpParametre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_parametres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_parametres/edit.html.twig', [
            'erp_parametre' => $erpParametre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_parametres_delete', methods: ['POST'])]
    public function delete(Request $request, ErpParametres $erpParametre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpParametre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpParametre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_parametres_index', [], Response::HTTP_SEE_OTHER);
    }
}
