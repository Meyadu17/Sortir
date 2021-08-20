<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class MainController extends AbstractController
{

    /**
     * @Route ("/accueil", name="accueil")
     */
    public function accueil()
    {
        $sortieRepo = $this->getDoctrine()->getrepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig",[
            "sorties"=>$sorties
        ]);
    }
 
}