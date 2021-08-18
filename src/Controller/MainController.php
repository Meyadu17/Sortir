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
 
}