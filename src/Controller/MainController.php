<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Participant;
use App\Entity\Site;
use App\Entity\Ville;
use App\Repository\SortieRepository;
use phpDocumentor\Reflection\Types\Boolean;
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

       #Creation de l'instance etat
       $etat = new etat;
       $etat->getLibelle();

//        $villeRepo = $this->getDoctrine()->getRepository(Ville::class);
//        $ville = $villeRepo->findAll();

        $siteRepo = $this->getDoctrine()->getRepository(Site::class);
        $sites = $siteRepo->findAll();


        /** @var SortieRepository $sortieRepo */
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);


        // récupérer les noms de villes depuis la BDD
        $idSite = $request->get('site');

        // récupérer les sorties par date de début
        $date1 = $request->get('date_debut');

        // récupérer les psorties par date de fin
        $date2 = $request->get('date_fin');

        // checkbox sorties organisateur
        $orgaFilter = $request->get('organisateur') == 'on';
        $orga = null;
        if ($orgaFilter) {
            $orga = $this->getUser();
        }
        // checkbox inscription
        $participantFilter = $request->get ('inscrit') == 'on';
        $inscrit = null;
        if ($participantFilter){
            $inscrit = $this->getUser();
        }



        // récupérer la chaine de caractère sur laquelle on va filtrer.
        $nomSortie = $request->get('recherche');
        $sorties = $sortieRepo->findByFilter($nomSortie,$idSite,$date1,$date2,$orga,$inscrit);




        //----------RESULTAT DE LA RECHERCHE----------//
        //Creation de l'instance etat
        $etat = new etat();
        $etat->getLibelle();

        //
//        $paticipant = new Participant();
//        $paticipants
//        $inscrit=false;
//        if ($paticipant)
//        {
//
//        }

        return $this->render("default/accueil.html.twig", [
            "sites" => $sites,
            "sorties" => $sorties,
            "etat" =>$etat
        ]);
    }


}