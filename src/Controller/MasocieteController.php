<?php

namespace App\Controller;

use App\Entity\Masociete;
use App\Form\MasocieteType;
use App\Repository\MasocieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/masociete')]
class MasocieteController extends AbstractController
{
    #[Route('/', name: 'app_masociete_index', methods: ['GET'])]
    public function index(MasocieteRepository $masocieteRepository): Response
    {
        return $this->render('masociete/index.html.twig', [
            'masocietes' => $masocieteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_masociete_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $masociete = new Masociete();
        $form = $this->createForm(MasocieteType::class, $masociete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($masociete);
            $entityManager->flush();

            return $this->redirectToRoute('app_masociete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('masociete/new.html.twig', [
            'masociete' => $masociete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_masociete_show', methods: ['GET'])]
    public function show(Masociete $masociete): Response
    {
        return $this->render('masociete/show.html.twig', [
            'masociete' => $masociete,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_masociete_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Masociete $masociete, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MasocieteType::class, $masociete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_masociete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('masociete/edit.html.twig', [
            'masociete' => $masociete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_masociete_delete', methods: ['POST'])]
    public function delete(Request $request, Masociete $masociete, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$masociete->getId(), $request->request->get('_token'))) {
            $entityManager->remove($masociete);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_masociete_index', [], Response::HTTP_SEE_OTHER);
    }
}
