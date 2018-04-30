<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SedesController extends Controller
{
    /**
     * @Route("/sedes", name="sedes")
     */
    public function nuevoSede(\Symfony\Component\HttpFoundation\Request $request, $codigoSedePk=null)
    {
        $em = $this->getDoctrine()->getManager();
        $pun= $this->get();

        if ($codigoSedePk != null) {
            $arSede = $em->getRepository('App:Sede')->find($codigoSedePk);
            if (!$arSede) {
                throw $this->createNotFoundException("No existe");
            } else {
                $form = $this->createForm(FormTypeSede::class, $arSede);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $arSede->setCodigoSede(1);
                    $em->flush();
                    return $this->redirect($this->generateUrl('listaSede'));
                }
                return $this->render('sedes/editarSedes.html.twig', [
                    'sedes' => $arSede,
                    'form' => $form->createView()
                ]);
            }
        } else {
            $arSede = new Sede();
            $form = $this->createForm(FormTypeSede::class, $arSede);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($arSede);
                $em->flush();
                return $this->redirect($this->generateUrl('listarSede'));
            }
            return $this->render('Sede/crearSede.html.twig',
                array(
                    'form' => $form->createView(),
                ));
        }
    }
}
