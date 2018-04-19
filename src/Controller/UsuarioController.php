<?php

namespace App\Controller;

use App\Forms\Type\FormTypeUsuario;
use App\Forms\Type\FormTypeCliente;
use App\Forms\Type\FormTypeCategoria;
use App\Forms\Type\FormTypeModulo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Usuario;
use App\Entity\Modulo;
use http\Env\Request;

class UsuarioController extends Controller
{

    /**
     * @Route("/usuario/{codigoUsuarioPk}", name="usuario", requirements={"codigoUsuarioPk":"\d+"})
     */
    public function nuevoUsuario(\Symfony\Component\HttpFoundation\Request $request, $codigoUsuarioPk=null)
    {
        $em = $this->getDoctrine()->getManager(); // instancia el entity manager
        $user = $this->getUser(); // trae el usuario actual
        if ($codigoUsuarioPk != null) { // valida si viene un parametro (idLlamada) para editar

            $arUsuario = $em->getRepository('App:Usuario')->find($codigoUsuarioPk);//consulta la Usuario a editar

            if (!$arUsuario) {

                throw $this->createNotFoundException("No existe ese usuario");

            } else {
                /** acá instancias form tipo Usuario */
                $form = $this->createForm(FormTypeUsuario::class, $arUsuario); //create form
                $form->handleRequest($request);

                /** fin instancia form */

                if ($form->isSubmitted() && $form->isValid()) { // se valida el submit del form
                    $arUsuario->setCodigoRol(1);
                    $em->flush();
                    return $this->redirect($this->generateUrl('listaUsuario'));
                }

                return $this->render('Admin/editarUsuario.html.twig', [
                    'usuarios' => $arUsuario,
                    'form' => $form->createView()
                ]);
            }
        } else { // si no viene un parametro se instancia el form vacio para crear Usuario

            $arUsuario = new Usuario(); //instance class
            $form = $this->createForm(FormTypeUsuario::class, $arUsuario);
            //create form
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($arUsuario);
                $em->flush();
                return $this->redirect($this->generateUrl('listarUsuario'));
            }

            return $this->render('admin/crearUsuario.html.twig',
                array(
                    'form' => $form->createView(),

                ));
        }
    }

    /**
     * @Route("/usuario/listar", name="listarUsuario")
     */
    public function listarUsuario(){

    }
}
