<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class MainController extends AbstractController
{
    /**
     * @Route ("/", name="connexion")
     */
    public function connexion()
    {

        return $this ->render("default/connexion");
    }

    /**
     * @Route ("/", name="accueil")
     */
    public function accueil()
    {
    }

    /**
     * @Route ("/", name="profil")
     */
    public function profil()
    {
    }

    /**
     * @Route ("/", name="afficherProfil")
     */
    public function afficherProfil()
    {
    }

    /**
     * @Route ("/", name="creerSortie")
     */
    public function creerSortie()
    {
    }

    /**
     * @Route ("/", name="afficherSortie")
     */
    public function afficherSortie()
    {
    }

    /**
     * @Route ("/", name="modifierSortie")
     */
    public function modifierSortie()
    {
    }

    /**
     * @Route ("/", name="annuler")
     */
    public function annuler()
    {
    }
}