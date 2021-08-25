<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Site;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sortie;

class MainController extends AbstractController
{
    /**
     * @Route ("/accueil", name="accueil")
     */
    public function accueil(Request $request)

    {
        //----------FORMULAIRE DE RECHERCHE----------//
        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $site = $siteRepo->findAll();

        /** @var SortieRepository $sortieRepo */
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);

        // récupérer la chaine de caractère sur laquelle on va filtrer.
        $nomSortie = $request->get('recherche');
        $sorties = $sortieRepo->findByFilter($nomSortie);

        //----------RESULTAT DE LA RECHERCHE----------//
        //Creation de l'instance etat
        $etat = new etat();
        $etat->getLibelle();

        return $this->render("default/accueil.html.twig", [
            "site" => $site,
            "sorties" => $sorties,
            "etat" =>$etat
        ]);
    }


}