<?php

namespace App\Controller;

use App\Entity\MembershipType;
use App\Form\MembershipTypeType;
use App\Repository\MembershipTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/membership/type')]
class MembershipTypeController extends AbstractController
{
    #[Route('/', name: 'app_membership_type_index', methods: ['GET'])]
    public function index(MembershipTypeRepository $membershipTypeRepository): Response
    {
        return $this->render('membership_type/index.html.twig', [
            'membership_types' => $membershipTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_membership_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MembershipTypeRepository $membershipTypeRepository): Response
    {
        $membershipType = new MembershipType();
        $form = $this->createForm(MembershipTypeType::class, $membershipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membershipTypeRepository->add($membershipType);
            return $this->redirectToRoute('app_membership_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('membership_type/new.html.twig', [
            'membership_type' => $membershipType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_membership_type_show', methods: ['GET'])]
    public function show(MembershipType $membershipType): Response
    {
        return $this->render('membership_type/show.html.twig', [
            'membership_type' => $membershipType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_membership_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MembershipType $membershipType, MembershipTypeRepository $membershipTypeRepository): Response
    {
        $form = $this->createForm(MembershipTypeType::class, $membershipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membershipTypeRepository->add($membershipType);
            return $this->redirectToRoute('app_membership_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('membership_type/edit.html.twig', [
            'membership_type' => $membershipType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_membership_type_delete', methods: ['POST'])]
    public function delete(Request $request, MembershipType $membershipType, MembershipTypeRepository $membershipTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membershipType->getId(), $request->request->get('_token'))) {
            $membershipTypeRepository->remove($membershipType);
        }

        return $this->redirectToRoute('app_membership_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
