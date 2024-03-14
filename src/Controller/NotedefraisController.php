<?php

namespace App\Controller;

use App\Entity\Notedefrais;
use App\Form\NotedefraisType;
use App\Repository\NotedefraisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/notedefrais')]
class NotedefraisController extends AbstractController
{
    #[Route('/', name: 'app_notedefrais_index', methods: ['GET'])]
    public function index(NotedefraisRepository $notedefraisRepository): Response
    {
        return $this->render('notedefrais/index.html.twig', [
            'notedefrais' => $notedefraisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_notedefrais_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $notedefrai = new Notedefrais();
        $form = $this->createForm(NotedefraisType::class, $notedefrai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($notedefrai);
            $entityManager->flush();

            return $this->redirectToRoute('app_notedefrais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notedefrais/new.html.twig', [
            'notedefrai' => $notedefrai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_notedefrais_show', methods: ['GET'])]
    public function show(Notedefrais $notedefrai): Response
    {
        return $this->render('notedefrais/show.html.twig', [
            'notedefrai' => $notedefrai,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_notedefrais_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Notedefrais $notedefrai, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NotedefraisType::class, $notedefrai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_notedefrais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('notedefrais/edit.html.twig', [
            'notedefrai' => $notedefrai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_notedefrais_delete', methods: ['POST'])]
    public function delete(Request $request, Notedefrais $notedefrai, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$notedefrai->getId(), $request->request->get('_token'))) {
            $entityManager->remove($notedefrai);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_notedefrais_index', [], Response::HTTP_SEE_OTHER);
    }
}
