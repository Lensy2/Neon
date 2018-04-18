<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Forms\Type\Form;
use Symfony\Component\Security\Core\SecurityContext;


class SecurityController extends Controller
{
    /**
     * @Route("/acceso", name="acceso")
     */
    public function accesoAction(Request $request){

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
//        var_dump($error);exit();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(){
        throw new \RuntimeException('No puede ser llamada directamente');
    }

}
