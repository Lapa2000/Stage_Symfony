<?php

namespace App\Controller;

use App\Entity\Superheroes;
use App\Form\SuperheroesType;
use App\Repository\SuperheroesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/superheroes')]
class SuperheroesController extends AbstractController
{
    #[Route('/', name: 'app_superheroes_index', methods: ['GET'])]
    public function index(SuperheroesRepository $superheroesRepository): Response
    {
        return $this->render('superheroes/index.html.twig', [
            'superheroes' => $superheroesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_superheroes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $superhero = new Superheroes();
        $form = $this->createForm(SuperheroesType::class, $superhero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($superhero);
            $entityManager->flush();

            return $this->redirectToRoute('app_superheroes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('superheroes/new.html.twig', [
            'superhero' => $superhero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_superheroes_show', methods: ['GET'])]
    public function show(Superheroes $superhero): Response
    {
        return $this->render('superheroes/show.html.twig', [
            'superhero' => $superhero,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_superheroes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Superheroes $superhero, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SuperheroesType::class, $superhero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_superheroes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('superheroes/edit.html.twig', [
            'superhero' => $superhero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_superheroes_delete', methods: ['POST'])]
    public function delete(Request $request, Superheroes $superhero, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$superhero->getId(), $request->request->get('_token'))) {
            $entityManager->remove($superhero);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_superheroes_index', [], Response::HTTP_SEE_OTHER);
    }
}
