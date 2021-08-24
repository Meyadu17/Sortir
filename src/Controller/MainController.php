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
        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $site=$siteRepo-> findAll();

        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $sortieRepo->afficherSorties();

        return $this->render("default/accueil.html.twig",[
            "site"=>$site,
            "sorties"=>$sorties
        ]);
    }

    /**
     * @Route ("/sortie/{id}", name="sortie_detail",
     *     requirements={"id": "\d+"},
     *     methods={"GET"})
     */
    public function detail($id)
    {
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);

        return$this->render('sortie/afficher.html.twig', [
            "sorties" => $sortie
        ]);
    }
}