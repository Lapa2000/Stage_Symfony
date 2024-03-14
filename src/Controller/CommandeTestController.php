<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandeTestController extends AbstractController
{
    #[Route('/commande/test', name: 'app_commande_test')]
    public function index(): Response
    {
        return $this->render('commande_test/index.html.twig', [
            'controller_name' => 'CommandeTestController',
        ]);
    }

    #[Route('/commande', name: 'create_commande')]
    public function createCommande(EntityManagerInterface $entityManager): Response
    {
        $product = new ErpCommandeClient();
        $product->setCode(110);
        $product->setNomclient('Ahmed');
        $product->setMonlogo('logo blue');
        $product->setMasociete('ScociétéMax');
        $product->setMonadresse('Metz 54500');
        $product->setMontel('95022478');
        $product->setAdresse('Entrp Nancy 54000');
        $product->setTelclient('07561478');
        $product->setCodedevis('111');
        $product->setDatedevis('12/01/2024');
        $product->setTotalht('50000');
        $product->setTotaltva('250');
        $product->setTotalttc('450');
        $product->setCreepar('Mr.Momo');
        $product->setDatecreation('07/12/2023');
        $product->setDatemodification('09/01/2024');
        

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}
