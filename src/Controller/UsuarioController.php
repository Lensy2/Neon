<?php

namespace App\Controller;

use App\Forms\Type\FormTypeUsuario;
use App\Forms\Type\FormTypeCliente;
use App\Forms\Type\FormTypeCategoria;
use App\Forms\Type\FormTypeModulo;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Usuario;
use App\Entity\Modulo;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository;
use Symfony\Component\Form\FormTypeInterface;


class UsuarioController extends Controller
{
    
    /**
     * @Route("/punto_usuario", name="lista_usuario")
     */
    public function listaAction(Request $request) {
        $sesion = new Session();
        $page=$request->query->get('page', 1);
        $maxPerPage = '50';
        $currentPage = $page;
        if (!$page){$currentPage = '1';}

        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $sesion->get('filtroNombreUsuario'), 'required'=>false))
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
        return $this->render('usuario/listaUsuario.html.twig',array('pager' => $pagerfanta, 'form'=>$form->createView()));

    }

    public function lista() {
        $sesion = new Session();
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('App:Usuario')->listaDQL(
            $sesion->get("filtroNombreUsuario")
        );
    }

    private function filtrar($form) {
        $sesion = new Session();
        $sesion->set("filtroNombreUsuario", $form->get('TxtNombre')->getData());
    }

    /**
     * @Route("/usuario/crear_usuario", name="crear_usuario")
     */
    public function nuevoAction(Request $request, $codigoUsuario = '') {
        $em = $this->getDoctrine()->getManager();
        $arUsuario= new Usuario();
        if ($codigoUsuario != '' && $codigoUsuario != '0') {
            $arUsuario = new Usuario();
            $arUsuario = $em->getRepository('Usuario')->find($codigoUsuario);

        }
        $form = $this->createForm(FormTypeUsuario::class, $arUsuario);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arUsuario = new Usuario();
                $arUsuario = $form->getData();
                $arUsuario->setSedeRel($arUsuario);
                if ($form->get('btnGuardar')->isClicked()) {
                    $em->persist($arUsuario);
                    $em->flush();
                    return $this->redirect($this->generateUrl('lista_usuario', array('codigoUsuario' => 0)));
                } else {
                    return $this->redirect($this->generateUrl('lista_usuario'));
                }
            }
        }
        return $this->render('usuario/crearUsuario.html.twig', array(
            'arPunto' => $arUsuario,
            'form' => $form->createView()));
    }

}
