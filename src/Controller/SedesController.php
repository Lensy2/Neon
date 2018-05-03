<?php

namespace App\Controller;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SedesController extends Controller
{
    /**
     * @Route("/punto_sede", name="lista_sede")
     */
    public function listaAction(Request $request) {
        $sesion = new Session();
        $page=$request->query->get('page', 1);
        $maxPerPage = '50';
        $currentPage = $page;
        if (!$page){$currentPage = '1';}

        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $sesion->get('filtroNombreSede'), 'required'=>false))
            ->add('BtnFiltrar', SubmitType::class, array('label' => 'Filtrar'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if ($form->get('BtnFiltrar')->isClicked()) {
                $this->filtrar($form);
                $currentPage = 1;
            }
        }
        $dqlLista = $this->lista();
        $adapter = new DoctrineORMAdapter($dqlLista);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($maxPerPage)->setCurrentPage($currentPage);
        return $this->render('sedes/listaSede.html.twig',array('pager' => $pagerfanta, 'form'=>$form->createView()));

    }

    public function lista() {
        $sesion = new Session();
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('App:Sede')->listaDQL(
            $sesion->get("filtroNombreSede")
        );
    }

    private function filtrar($form) {
        $sesion = new Session();
        $sesion->set("filtroNombreSede", $form->get('TxtNombre')->getData());
    }
    /**
     * @Route("/sede/crear_sede", name="crear_sede")
     */
    public function nuevoAction(Request $request, $codigoSede = '') {
        $em = $this->getDoctrine()->getManager();
        $arSede= new Sede();
        if ($codigoSede != '' && $codigoSede != '0') {
            $arSede = new Sede();
            $arSede = $em->getRepository('Sede')->find($codigoSede);

        }
        $form = $this->createForm(\App\Forms\Type\FormTypeSede::class, $arSede);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arSede = new Sede();
                $arSede = $form->getData();
                $arSede>setSedeRel($arSede);
                if ($form->get('btnGuardar')->isClicked()) {
                    $em->persist($arSede);
                    $em->flush();
                    return $this->redirect($this->generateUrl('lista_sede', array('codigoSede' => 0)));
                } else {
                    return $this->redirect($this->generateUrl('lista_sede'));
                }
            }
        }
        return $this->render('sedes/listaSede.html.twig', array(
            'arSede' => $arSede,
            'form' => $form->createView()));
    }

}
