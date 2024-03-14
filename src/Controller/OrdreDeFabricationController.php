<?php

namespace App\Controller;

use App\Entity\OrdreDeFabrication;
use App\Form\OrdreDeFabricationType;
use App\Repository\OrdreDeFabricationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ordre/de/fabrication')]
class OrdreDeFabricationController extends AbstractController
{
    #[Route('/', name: 'app_ordre_de_fabrication_index', methods: ['GET'])]
    public function index(OrdreDeFabricationRepository $ordreDeFabricationRepository): Response
    {
        return $this->render('ordre_de_fabrication/index.html.twig', [
            'ordre_de_fabrications' => $ordreDeFabricationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ordre_de_fabrication_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordreDeFabrication = new OrdreDeFabrication();
        $form = $this->createForm(OrdreDeFabricationType::class, $ordreDeFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ordreDeFabrication);
            $entityManager->flush();

            return $this->redirectToRoute('app_ordre_de_fabrication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ordre_de_fabrication/new.html.twig', [
            'ordre_de_fabrication' => $ordreDeFabrication,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ordre_de_fabrication_show', methods: ['GET'])]
    public function show(OrdreDeFabrication $ordreDeFabrication): Response
    {
        return $this->render('ordre_de_fabrication/show.html.twig', [
            'ordre_de_fabrication' => $ordreDeFabrication,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ordre_de_fabrication_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrdreDeFabrication $ordreDeFabrication, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrdreDeFabricationType::class, $ordreDeFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ordre_de_fabrication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ordre_de_fabrication/edit.html.twig', [
            'ordre_de_fabrication' => $ordreDeFabrication,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ordre_de_fabrication_delete', methods: ['POST'])]
    public function delete(Request $request, OrdreDeFabrication $ordreDeFabrication, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordreDeFabrication->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ordreDeFabrication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ordre_de_fabrication_index', [], Response::HTTP_SEE_OTHER);
    }
}
