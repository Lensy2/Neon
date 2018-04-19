<?php

namespace App\Controller;

use App\Forms\Type\FormTypeUsuario;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuario", name="usuario")
     */
    public function index()
    {
        $arUsuario=$this->getDoctrine()->getManager()->getRepository('App:Usuario')->findAll();
        $form = $this->createForm(FormTypeUsuario::class, $arUsuario); //create form

        return $this->render('admin/crearUsuario.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
