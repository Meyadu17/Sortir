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


        // récupérer la chaine de caractère sur laquelle on va filtrer.
        $nomSortie = $request->get('recherche');
        $sorties = $sortieRepo->findByFilter($nomSortie,$idSite);

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