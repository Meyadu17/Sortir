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
            return $this->redirectToRoute('accueil');
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
        //Cette methode peut être vide - elle est interprété par la clé de déconnexion du firewall.');
    }
}
