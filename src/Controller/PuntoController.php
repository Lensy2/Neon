<?php

namespace App\Controller;

use App\Repository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use App\Entity\Punto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PuntoController extends Controller

{
    /**
     * @Route("//punto_lista", name="lista_punto")
     */
    public function listaAction(Request $request) {
        $sesion = new Session();
        $page=$request->query->get('page', 1);
        $maxPerPage = '50';
        $currentPage = $page;
        if (!$page){$currentPage = '1';}

        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $sesion->get('filtroNombrePunto'), 'required'=>false))
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
        return $this->render('puntos/listaPunto.html.twig',array('pager' => $pagerfanta, 'form'=>$form->createView()));

    }

    public function lista() {
        $sesion = new Session();
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('App:Punto')->listaDQL(
            $sesion->get("filtroNombrePunto")
        );
    }

    private function filtrar($form) {
        $sesion = new Session();
        $sesion->set("filtroNombrePunto", $form->get('TxtNombre')->getData());
    }

    /**
     * @Route("/punto/crear_punto", name="crear_punto")
     */
    public function nuevoAction(Request $request, $codigoPunto = '') {
        $em = $this->getDoctrine()->getManager();
        $arPunto= new Punto();
        if ($codigoPunto != '' && $codigoPunto != '0') {
            $arPunto = new Punto();
            $arPunto = $em->getRepository('Punto')->find($codigoPunto);

        }
        $form = $this->createForm(\App\Forms\Type\FormTypePunto::class, $arPunto);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arPunto = new Punto();
                $arSede = $form->getData();
                $arPunto->setSedeRel($arPunto);
                if ($form->get('btnGuardar')->isClicked()) {
                    $em->persist($arSede);
                    $em->flush();
                    return $this->redirect($this->generateUrl('lista_punto', array('codigoPunto' => 0)));
                } else {
                    return $this->redirect($this->generateUrl('lista_punto'));
                }
            }
        }
        return $this->render('puntos/crearPunto.html.twig', array(
            'arPunto' => $arPunto,
            'form' => $form->createView()));
    }

}







