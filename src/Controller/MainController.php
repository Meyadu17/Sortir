<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Ville;
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
       #Creation de l'instance etat
       $etat = new etat;
       $etat->getLibelle();

        $villeRepo = $this->getDoctrine()->getRepository(Ville::class);
        $ville = $villeRepo->findAll();

        /** @var SortieRepository $sortieRepo */
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);

        // récupérer les noms de villes depuis la BDD
        $nomVille = $request->get($villeRepo);
        $ville = $villeRepo->findByFilter($nomVille);


        // récupérer la chaine de caractère sur laquelle on va filtrer.
        $nomSortie = $request->get('recherche');
        $sorties = $sortieRepo->findByFilter($nomSortie);

        return $this->render("default/accueil.html.twig", [
            "ville" => $ville,
            "sorties" => $sorties,
            "etat" =>$etat
        ]);
    }


}