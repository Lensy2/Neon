<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Cliente2Controller extends Controller
{
    var $strDqlLista = "";
    var $strCodigo = "";
    var $strNombre = "";
    var $strNit = "";

    /**
     * @Route("/cliente2/", name="cliente2")
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
                    $em->getRepository('App:Cliente2')->eliminar($arrSeleccionados);
                } catch (ForeignKeyConstraintViolationException $exception) {
                    if ($exception) {
                    }
                }
                return $this->redirect($this->generateUrl('brs_tur_base_cliente'));
            }
        }
        $arClientes = $paginator->paginate($em->createQuery($this->strDqlLista), $request->query->get('page', 1), 20);
        return $this->render('BrasaTurnoBundle:Base/Cliente:lista.html.twig', array(
            'arClientes' => $arClientes,
            'form' => $form->createView()));
    }
}
