<?php

namespace App\Controller;

use App\Entity\Participant;
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
        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $site = $siteRepo->findAll();

        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig", [
            "site" => $site,
            "sorties" => $sorties,
        ]);
    }
}