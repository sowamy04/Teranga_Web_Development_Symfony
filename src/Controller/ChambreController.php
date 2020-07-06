<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreController extends AbstractController
{
    /**
     * @Route("/", name="chambre")
     */
    public function index(ChambreRepository $chambreRepositoy)
    {
        $chambre = new Chambre();
        $rooms = $chambreRepositoy->findAll();
        $form= $this->createForm(ChambreType::class, $chambre);
        return $this->render('chambre/chambre.html.twig', [
            'controller_name' => 'ChambreController',
            'chambreForm' => $form->createView(),
            "rooms" => $rooms
        ]);
    }
    /**
     * @Route("/chambre/{id<\d+>}/delete", name="delete_room")
     */
    public function delete(EntityManagerInterface $em,Chambre $room)
    {
        // if($room->getEtudiant()){
        //     dd($room->getEtudiant()[0]->getNom());
        // }
        $em->remove($room);
        $em->flush();
        return $this->redirectToRoute("chambre");
    }
    /**
     * @Route("/chambre/{id<\d+>}/update", name="update_room")
     */
    public function update(Request $request,ChambreRepository $chambreRepositoy,EntityManagerInterface $em,Chambre $room)
    {
        
        $rooms = $chambreRepositoy->findAll();
        $form= $this->createForm(ChambreType::class, $room);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($room);
            $em->flush();
            return $this->redirectToRoute("chambre");
        }
        
        return $this->render('chambre/update.html.twig', [
            'controller_name' => 'ChambreController',
            'chambreForm' => $form->createView(),
        ]);
    }

}
