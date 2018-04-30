<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PuntosController extends Controller

{
    /**
     * @Route("/punto_nuevo", name="nuevo_puntos")
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
    /**
     * @Route("/punto_lista", name="lista_punto")
     */
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
 }

