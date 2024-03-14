<?php

namespace App\Controller;

use App\Entity\ErpVille;
use App\Form\ErpVilleType;
use App\Repository\ErpVilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/ville')]
class ErpVilleController extends AbstractController
{
    #[Route('/', name: 'app_erp_ville_index', methods: ['GET'])]
    public function index(ErpVilleRepository $erpVilleRepository): Response
    {
        return $this->render('erp_ville/index.html.twig', [
            'erp_villes' => $erpVilleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_ville_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpVille = new ErpVille();
        $form = $this->createForm(ErpVilleType::class, $erpVille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpVille);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ville_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ville/new.html.twig', [
            'erp_ville' => $erpVille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ville_show', methods: ['GET'])]
    public function show(ErpVille $erpVille): Response
    {
        return $this->render('erp_ville/show.html.twig', [
            'erp_ville' => $erpVille,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_ville_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpVille $erpVille, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpVilleType::class, $erpVille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_ville_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_ville/edit.html.twig', [
            'erp_ville' => $erpVille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_ville_delete', methods: ['POST'])]
    public function delete(Request $request, ErpVille $erpVille, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpVille->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpVille);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_ville_index', [], Response::HTTP_SEE_OTHER);
    }
}
