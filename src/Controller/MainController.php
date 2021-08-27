<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Participant;
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
        //Affichage des sites
        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $sites = $siteRepo->findAll();

        // récupérer les noms du site depuis la BDD
        $idSite = $request->get('site');

        // récupérer les sorties par date de début
        $date1 = $request->get('date_debut'); // récupère la date selectionnée par l'utilisateur

        // récupérer les sorties par date de fin
        $date2 = $request->get('date_fin'); // récupère la date selectionnée par l'utilisateur

        // checkbox sorties organisateur
        $orgaFilter = $request->get('organisateur') == 'on'; // instanciation d'un filtre pour la checkbox
        $orga = null;
        if ($orgaFilter) { // si le filtre est "on"
            $orga = $this->getUser(); // récupèration de l'utilisateur

        }

        // checkbox inscription
        $participantFilter = $request->get ('inscrit') == 'on';
        $inscrit = null;
        if ($participantFilter){
            $inscrit = $this->getUser();
        }
        // checkbox non inscrit
        $participantFilter = $request->get ('noninscrit') == 'on';
        $nonInscrit = null;
        if ($participantFilter) {
            $nonInscrit = $this->getUser();
        }
        // checkbox sorties passées
        $sortieFilter = $request->get ('sortiesend') == 'on'; //instanciation d'un filtre
        $sortiesEnd = null;
        if ($sortieFilter){
            $sortiesEnd = new \DateTime(); // récupération de la date du jour
        }


        //Affichage des sorties
        /** @var SortieRepository $sortieRepo */
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);

        // récupérer la chaine de caractère sur laquelle on va filtrer.
        $nomSortie = $request->get('recherche');

       //Creation de l'instance etat
       $etat = new etat;
       $etat->getLibelle();

        //Recherche avec tous les filtres
        $sorties = $sortieRepo->findByFilter($nomSortie, $idSite, $date1, $date2, $orga, $inscrit, $nonInscrit, $sortiesEnd);

        //----------RESULTAT DE LA RECHERCHE----------//
        //Creation de l'instance etat
        $etat = new etat();
        $etat->getLibelle();

        return $this->render("default/accueil.html.twig", [
            "sites" => $sites,
            "sorties" => $sorties,
            "etat" =>$etat,
            "nomSortie" =>$nomSortie,
            "idSite" =>$idSite,
            "date1" =>$date1,
            "date2" =>$date2,
            "orga" =>$orga,
            "inscrit" =>$inscrit,
            "nonInscrit" =>$nonInscrit,
            "sortiesEnd" =>$sortiesEnd,

        ]);
    }


}