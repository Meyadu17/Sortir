<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sortie;

Class MainController extends AbstractController
{

    /**
     * @Route ("/accueil", name="accueil")
     */
    public function accueil()
    {
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig",[
            "sorties"=>$sorties
        ]);
    }
 
}