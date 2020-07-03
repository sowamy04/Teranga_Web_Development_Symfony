<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/", name="chambre")
     */
    public function index()
    {
        return $this->render('chambre/chambre.html.twig', [
            'controller_name' => 'ChambreController',
        ]);
    }

}
