<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class MainController extends AbstractController
{
    /**
     * @Route ("/", name="connexion")
     */
    public function connexion()
    {

        return $this->render("default/connexion.html.twig");
    }

    /**
     * @Route ("/accueil.php", name="accueil")
     */
    public function accueil()
    {
        return $this->render("default/accueil.html.twig");
    }

    /**
     * @Route("/monprofil.php", name="mon_profil")
     */
    public function monProfil()
    {
        return $this->render("profil/monProfil.html.twig");
    }

    /**
     * @Route("/profil.php?ID={id}", name="profil_detail", requirements={"id":"\d+"}, methods={"GET"})
     */
    public function afficherProfil()
    {
        return $this->render("profil/profil.html.twig");
    }
}