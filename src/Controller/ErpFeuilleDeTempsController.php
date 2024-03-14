<?php

namespace App\Controller;

use App\Entity\ErpFeuilleDeTemps;
use App\Form\ErpFeuilleDeTempsType;
use App\Repository\ErpFeuilleDeTempsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/feuille/de/temps')]
class ErpFeuilleDeTempsController extends AbstractController
{
    #[Route('/', name: 'app_erp_feuille_de_temps_index', methods: ['GET'])]
    public function index(ErpFeuilleDeTempsRepository $erpFeuilleDeTempsRepository): Response
    {
        return $this->render('erp_feuille_de_temps/index.html.twig', [
            'erp_feuille_de_temps' => $erpFeuilleDeTempsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_feuille_de_temps_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpFeuilleDeTemp = new ErpFeuilleDeTemps();
        $form = $this->createForm(ErpFeuilleDeTempsType::class, $erpFeuilleDeTemp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpFeuilleDeTemp);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_feuille_de_temps_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_feuille_de_temps/new.html.twig', [
            'erp_feuille_de_temp' => $erpFeuilleDeTemp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_feuille_de_temps_show', methods: ['GET'])]
    public function show(ErpFeuilleDeTemps $erpFeuilleDeTemp): Response
    {
        return $this->render('erp_feuille_de_temps/show.html.twig', [
            'erp_feuille_de_temp' => $erpFeuilleDeTemp,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_feuille_de_temps_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpFeuilleDeTemps $erpFeuilleDeTemp, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpFeuilleDeTempsType::class, $erpFeuilleDeTemp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_feuille_de_temps_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_feuille_de_temps/edit.html.twig', [
            'erp_feuille_de_temp' => $erpFeuilleDeTemp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_feuille_de_temps_delete', methods: ['POST'])]
    public function delete(Request $request, ErpFeuilleDeTemps $erpFeuilleDeTemp, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpFeuilleDeTemp->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpFeuilleDeTemp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_feuille_de_temps_index', [], Response::HTTP_SEE_OTHER);
    }
}
