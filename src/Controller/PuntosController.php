<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PuntosController extends Controller

{
    /**
     * @Route("/puntos", name="puntos")
     */
    public function nuevoPunto(\Symfony\Component\HttpFoundation\Request $request, $codigoPuntoPk=null)
    {
        $em = $this->getDoctrine()->getManager();
        $pun= $this->get();

        if ($codigoPuntoPk != null) {
            $arPunto = $em->getRepository('Puntos')->find($codigoPuntoPk);
            if (!$arPunto) {
                throw $this->createNotFoundException("No existe");
            } else {
                $form = $this->createForm(FormTypePuntos::class, $arPunto);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $arPunto->setCodigoRol(1);
                    $em->flush();
                    return $this->redirect($this->generateUrl('listaPuntos'));
                }
                return $this->render('puntos/editarPuntos.html.twig', [
                    'puntos' => $arPunto,
                    'form' => $form->createView()
                ]);
            }
        } else {
            $arPuntos = new Puntos();
            $form = $this->createForm(FormTypePuntos::class, $arPuntos);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($arPuntos);
                $em->flush();
                return $this->redirect($this->generateUrl('listarPuntos'));
            }
            return $this->render('Puntos/crearPuntos.html.twig',
                array(
                    'form' => $form->createView(),
                ));
        }
    }

 }

