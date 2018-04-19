<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActividadesController extends Controller
{
    /**
     * @Route("/actividades", name="actividades")
     */
    public function index()
    {
        return $this->render('actividades/index.html.twig', [
            'controller_name' => 'ActividadesController',
        ]);
    }
}
