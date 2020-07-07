<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreController extends AbstractController
{
    /**
     * @Route("/", name="chambre", methods={"POST", "GET"})
     */
    public function create(Request $request, EntityManagerInterface $en): Response
    {

        $chambre = new Chambre();
        $form= $this->createForm(ChambreType::class, $chambre);
        dump($form);
        

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $en = $this->getDoctrine()->getManager();
            $en->persist($chambre);
            $en->flush();
            return $this->redirectToRoute('chambre');
        }

        return $this->render('chambre/chambre.html.twig', [
            'controller_name' => 'ChambreController',
            'chambreForm' => $form->createView(),
        ]);
    }

}
