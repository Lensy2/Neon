<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SedesController extends Controller
{
    /**
     * @Route("/sedes", name="sedes")
     */
    public function index()
    {
        return $this->render('sedes/index.html.twig', [
            'controller_name' => 'SedesController',
        ]);
    }
}
