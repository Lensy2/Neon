<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PuestoController extends Controller
{
    /**
     * @Route("/puesto", name="puesto")
     */
    public function index()
    {
        return $this->render('puesto/index.html.twig', [
            'controller_name' => 'PuestoController',
        ]);
    }
}
