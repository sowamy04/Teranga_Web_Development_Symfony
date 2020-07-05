<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreController extends AbstractController
{
    /**
     * @Route("/", name="chambre")
     */
    public function index()
    {
        $chambre = new Chambre();
        $form= $this->createForm(ChambreType::class, $chambre);
        return $this->render('chambre/chambre.html.twig', [
            'controller_name' => 'ChambreController',
            'chambreForm' => $form->createView(),
        ]);
    }

}
