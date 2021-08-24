<?php

namespace App\Controller;

use App\Entity\Site;
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
//        $site = new site();

        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $site=$siteRepo-> findAll();

        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig",[
            "site"=>$site,
            "sorties"=>$sorties
        ]);
    }
 
}