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

//    /**
//     * @Route("/usuario/{codigoUsuarioPk}", name="usuario", requirements={"codigoUsuarioPk":"\d+"})
//     */
//    public function nuevoUsuario(Request $request, $codigoUsuarioPk=null)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $user = $this->getUser();
//        if ($codigoUsuarioPk != null) {
//            $arUsuario = $em->getRepository('App:Usuario')->find($codigoUsuarioPk);
//            if (!$arUsuario) {
//                throw $this->createNotFoundException("No existe ese usuario");
//            } else {
//                $form = $this->createForm(FormTypeUsuario::class, $arUsuario);
//                $form->handleRequest($request);
//                if ($form->isSubmitted() && $form->isValid()) {
//                    $arUsuario->setCodigoRol(1);
//                    $em->flush();
//                    return $this->redirect($this->generateUrl('listaUsuario'));
//                }
//                return $this->render('usuario/editarUsuario.html.twig', [
//                    'usuarios' => $arUsuario,
//                    'form' => $form->createView()
//                ]);
//            }
//        } else {
//            $arUsuario = new Usuario();
//            $form = $this->createForm(FormTypeUsuario::class, $arUsuario);
//            $form->handleRequest($request);
//            if ($form->isSubmitted() && $form->isValid()) {
//                $em->persist($arUsuario);
//                $em->flush();
//                return $this->redirect($this->generateUrl('listarUsuario'));
//            }
//            return $this->render('usuario/crearUsuario.html.twig',
//                array(
//                    'form' => $form->createView(),
//                ));
//        }
//    }
//
//    /**
//     * @Route("/usuario/listar", name="listarUsuario")
//     */
//    public function listarUsuario(){
//
//    }
}
