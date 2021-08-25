<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Site;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sortie;

class MainController extends AbstractController
{
    /**
     * @Route ("/accueil", name="accueil")
     */
    public function accueil()
    {
       #Creation de l'instance etat
       $etat = new etat;
       $etat->getLibelle();

        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $site = $siteRepo->findAll();

        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig", [
            "site" => $site,
            "sorties" => $sorties,
            "etat" =>$etat
        ]);
    }
}