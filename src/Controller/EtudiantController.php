<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantUpdateType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index( EtudiantRepository $etudiantRepository)
    {
        $etudiants = $etudiantRepository->findAll();
        //dd($etudiants);
        return $this->render('etudiant/etudiant.html.twig', compact(('etudiants')));
    }

    /**
     * @Route("/etudiant/{id<[0-9]+>}", name="update", methods={"POST", "GET"})
     */
    public function update(Request $request, EntityManagerInterface $en, Etudiant $etudiant): Response
    {
        $form= $this->createForm(EtudiantUpdateType::class, $etudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $en = $this->getDoctrine()->getManager();
            $en->persist($etudiant);
            $en->flush();
            return $this->redirectToRoute('etudiant');
        }

        return $this->render('etudiant/etudiant.html.twig', [ 
            'controller_name' => $etudiant,
            'etudiantForm' => $form->createView(), 
        ]);
    }
}
