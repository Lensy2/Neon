<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RolController extends Controller
{
    /**
     * @Route("/rol", name="rol")
     */
    public function index()
    {
        return $this->render('rol/index.html.twig', [
            'controller_name' => 'RolController',
        ]);
    }
}
