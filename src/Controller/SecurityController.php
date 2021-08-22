<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="connexion")
     */
    public function connexion(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('connexion');
        }

        // Erreur de connexion
        $error = $authenticationUtils->getLastAuthenticationError();

        // Dernier identifiant utilisé par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['dernier_identifiant' => $lastUsername, 'erreur' => $error]);
    }

    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function logout()
    {
        $this->get('session')->remove('user');
        return $this->redirectToRoute('connexion');
        #throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
