<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/chambre/{id<\d+>}/isRoomEmpty", name="is_room_empty",methods={"POST"})
     */
    public function isRoomEmpty(EtudiantRepository $studentRepository,Chambre $room) {
        $student = $studentRepository->findOneBy([
            "chambre" => $room
        ]);
        $status = ["message" => ""];
        if($student){
            $status["message"] = "occuped";
        }else {
            $status["message"] = "empty";
        }
        return new JsonResponse(json_encode($status));
    }
    /**
     * @Route("/chambre/{id<\d+>}/delete", name="delete_room")
     */
    public function delete(EntityManagerInterface $em,Chambre $room)
    {
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
