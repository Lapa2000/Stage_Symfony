<?php

namespace App\Controller;

use App\Entity\ErpAdmin;
use App\Entity\ErpEmploye;
use App\Form\SigninType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class SigninController extends AbstractController
{
    #[Route('/signin', name: 'app_signin')]
    public function index(Request $req ,EntityManagerInterface $entityManager): Response
    {
        $admin = new ErpAdmin();
        $form = $this->createForm(SigninType::class, $admin);

        $form->handleRequest($req);
        
        if ($form->isSubmitted() && $form->isValid()) 
        { 
         
            $admin = $form -> getData();

            
            $entityManager -> persist($admin);
            $entityManager -> flush();
            // Afficher un message pour dire 'Ok'
        } else {
            // Afficher une erreur 
        }

        return $this->render('signin/index.html.twig', [
            'form' => $form -> createView(),
        ]);
    }
}
