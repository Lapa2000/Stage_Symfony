<?php

namespace App\Controller;

use App\Entity\ErpCommandeClient;
use App\Form\ErpCommandeClientType;
use App\Repository\ErpCommandeClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/commande/client')]
class ErpCommandeClientController extends AbstractController
{
    #[Route('/', name: 'app_erp_commande_client_index', methods: ['GET'])]
    public function index(ErpCommandeClientRepository $erpCommandeClientRepository): Response
    {
        return $this->render('erp_commande_client/index.html.twig', [
            'erp_commande_clients' => $erpCommandeClientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_commande_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpCommandeClient = new ErpCommandeClient();
        $form = $this->createForm(ErpCommandeClientType::class, $erpCommandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpCommandeClient);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_commande_client/new.html.twig', [
            'erp_commande_client' => $erpCommandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/commande', name: 'create_commande')]
    public function createCommande(EntityManagerInterface $entityManager): Response
    {
        // Création de l'instance de commande client
        $commandeClient = new ErpCommandeClient();
        $commandeClient->setCode(110);
        $commandeClient->setNomclient('Ahmed');
        $commandeClient->setMonlogo('logo blue');
        $commandeClient->setMasociete('ScociétéMax');
        $commandeClient->setMonadresse('Metz 54500');
        $commandeClient->setMontel('95022478');
        $commandeClient->setAdresse('Entrp Nancy 54000');
        $commandeClient->setTelclient('07561478');
        $commandeClient->setCodedevis('111');
        $commandeClient->setDatedevis('12/01/2024');
        $commandeClient->setTotalht('50000');
        $commandeClient->setTotaltva('250');
        $commandeClient->setTotalttc('450');
        $commandeClient->setCreepar('Mr.Momo');
        $commandeClient->setDatecreation('07/12/2023');
        $commandeClient->setDatemodification('09/01/2024');
    
        try {
            $entityManager->persist($commandeClient);
            $entityManager->flush();
    
            // Ajout d'un message flash pour le feedback utilisateur
            $this->addFlash('success', 'La commande a été créée avec succès !');
    
            // Redirection vers la liste des commandes ou la commande créée
            return $this->redirectToRoute('app_erp_commande_client_show', ['id' => $commandeClient->getId()]);
        } catch (\Exception $e) {
            // Logging de l'erreur ou gestion d'erreur spécifique
            $this->addFlash('error', 'Une erreur est survenue lors de la création de la commande.');
            return $this->redirectToRoute('app_erp_commande_client_index');
        }
    }
    

    #[Route('/{id}', name: 'app_erp_commande_client_show', methods: ['GET'])]
    public function show(ErpCommandeClient $erpCommandeClient): Response
    {
        return $this->render('erp_commande_client/show.html.twig', [
            'erp_commande_client' => $erpCommandeClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_commande_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpCommandeClient $erpCommandeClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpCommandeClientType::class, $erpCommandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_commande_client/edit.html.twig', [
            'erp_commande_client' => $erpCommandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_commande_client_delete', methods: ['POST'])]
    public function delete(Request $request, ErpCommandeClient $erpCommandeClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpCommandeClient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpCommandeClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_commande_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
