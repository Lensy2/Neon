<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller
{
    /**
     * Método para ir al inicio de la aplicación.
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->render('inicio/index.html.twig', [
            'controller_name' => 'InicioController',
        ]);
    }
}
