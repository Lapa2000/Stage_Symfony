<?php

namespace App\Controller;

use App\Entity\ErpBonLivraisonClientNew;
use App\Form\ErpBonLivraisonClientNewType;
use App\Repository\ErpBonLivraisonClientNewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/bon/livraison/client/new')]
class ErpBonLivraisonClientNewController extends AbstractController
{
    #[Route('/', name: 'app_erp_bon_livraison_client_new_index', methods: ['GET'])]
    public function index(ErpBonLivraisonClientNewRepository $erpBonLivraisonClientNewRepository): Response
    {
        return $this->render('erp_bon_livraison_client_new/index.html.twig', [
            'erp_bon_livraison_client_news' => $erpBonLivraisonClientNewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_bon_livraison_client_new_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpBonLivraisonClientNew = new ErpBonLivraisonClientNew();
        $form = $this->createForm(ErpBonLivraisonClientNewType::class, $erpBonLivraisonClientNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpBonLivraisonClientNew);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_bon_livraison_client_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_bon_livraison_client_new/new.html.twig', [
            'erp_bon_livraison_client_new' => $erpBonLivraisonClientNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_bon_livraison_client_new_show', methods: ['GET'])]
    public function show(ErpBonLivraisonClientNew $erpBonLivraisonClientNew): Response
    {
        return $this->render('erp_bon_livraison_client_new/show.html.twig', [
            'erp_bon_livraison_client_new' => $erpBonLivraisonClientNew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_bon_livraison_client_new_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpBonLivraisonClientNew $erpBonLivraisonClientNew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpBonLivraisonClientNewType::class, $erpBonLivraisonClientNew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_bon_livraison_client_new_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_bon_livraison_client_new/edit.html.twig', [
            'erp_bon_livraison_client_new' => $erpBonLivraisonClientNew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_bon_livraison_client_new_delete', methods: ['POST'])]
    public function delete(Request $request, ErpBonLivraisonClientNew $erpBonLivraisonClientNew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpBonLivraisonClientNew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpBonLivraisonClientNew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_bon_livraison_client_new_index', [], Response::HTTP_SEE_OTHER);
    }
}
