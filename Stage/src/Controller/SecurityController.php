<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function login( Request $request, AuthenticationUtils $authenticationUtils, Security $security): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        if($request->getSession());
        {
            return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);  
        }
        if ($security->isGranted('ROLE_USER')) {
            return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        }
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}

