<?php

namespace App\Controller;

use App\Entity\ErpContact;
use App\Form\ErpContactType;
use App\Repository\ErpContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/erp/contact')]
class ErpContactController extends AbstractController
{
    #[Route('/', name: 'app_erp_contact_index', methods: ['GET'])]
    public function index(ErpContactRepository $erpContactRepository): Response
    {
        return $this->render('erp_contact/index.html.twig', [
            'erp_contacts' => $erpContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_erp_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $erpContact = new ErpContact();
        $form = $this->createForm(ErpContactType::class, $erpContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($erpContact);
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contact/new.html.twig', [
            'erp_contact' => $erpContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contact_show', methods: ['GET'])]
    public function show(ErpContact $erpContact): Response
    {
        return $this->render('erp_contact/show.html.twig', [
            'erp_contact' => $erpContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_erp_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ErpContact $erpContact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ErpContactType::class, $erpContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_erp_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('erp_contact/edit.html.twig', [
            'erp_contact' => $erpContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_erp_contact_delete', methods: ['POST'])]
    public function delete(Request $request, ErpContact $erpContact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$erpContact->getId(), $request->request->get('_token'))) {
            $entityManager->remove($erpContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_erp_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
