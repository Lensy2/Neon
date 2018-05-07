<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Controller\TextType;


class Cliente2Controller extends Controller
{
    var $strDqlLista = "";
    var $strNombre = "";
    var $strNit = "";

    /**
     * @Route("lista/cliente2", name="cliente2")
     */
    public function listaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $form = $this->formularioFiltro();
        $form->handleRequest($request);
        $this->lista();
        if ($form->isSubmitted() && $form->isValid()) {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            if ($form->get('BtnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                try {
                    $em->getRepository('App:Cliente')->eliminar($arrSeleccionados);
                } catch (ForeignKeyConstraintViolationException $exception) {
                    if ($exception) {
                    }
                }
                return $this->redirect($this->generateUrl('cliente2'));
            }
        }

        $test = $this->strDqlLista;
        //$this->strDqlLista
        $arCliente2 = $paginator->paginate($em->createQuery($test), $request->query->get('page', 1), 20);
        return $this->render('cliente2/listaCliente2.html.twig', array(
            'arCliente2' => $arCliente2,
            'form' => $form->createView()));
    }

    private function lista() {
        $em = $this->getDoctrine()->getManager();
        $this->strDqlLista = $em->getRepository('App:Cliente')->listaDQL2($this->strNombre);
        var_dump($this->strDqlLista);
        die();
    }

    private function filtrar($form) {
        $this->strNombre = $form->get('TxtNombre')->getData();
        $this->strNit = $form->get('TxtNit')->getData();
        $this->lista();
    }

    private function formularioFiltro() {
        $form = $this->createFormBuilder()
            ->add('TxtNombre', \Symfony\Component\Form\Extension\Core\Type\TextType::class, array('label' => 'Nombre', 'data' => $this->strNombre))
            ->add('TxtNit', \Symfony\Component\Form\Extension\Core\Type\TextType::class, array('label' => 'Nit', 'data' => $this->strNit))
            ->add('BtnEliminar', SubmitType::class, array('label' => 'Eliminar',))
            ->add('BtnFiltrar', SubmitType::class, array('label' => 'Filtrar'))
            ->getForm();
        return $form;
    }

}
