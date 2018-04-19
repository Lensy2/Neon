<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PuntosController extends Controller
{
    /**
     * @Route("/puntos", name="puntos")
     */
    public function index()
    {
        return $this->render('puntos/index.html.twig', [
            'controller_name' => 'PuntosController',
        ]);
    }
}
